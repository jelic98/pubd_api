<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller {
   
	public function create(Request $request) {
		$fields = [
			'email' => 'required',
			'password' => 'required',
			'firstName' => 'required',
			'lastName' => 'required',
			'type' => 'required'
		];

		$this->validate($request, $fields);

		if(User::where('email', $request['email'])->first()) {
			return MyResponse::show('Email is already in use', 400);
		}

		if($request['type'] == 'mentor') {
			$fields = array_merge($fields, [
				'interval' => 'required',
				'price' => 'required',
				'location' => 'required',
				'promoted' => 'required',
				'schools' => 'required',
				'subjects' => 'required',
				'levels' => 'required'
			]);
		}else if($request['type'] == 'mentor') {
			$fields = array_merge($fields, [
				'school' => 'required',
				'grade' => 'required'
			]);
		}else {
			return MyResponse::show('Invalid type', 400);	
		}

		$this->validate($request, $fields);
	
		$temp = [];

		if($request['type'] == 'mentor') {	
			if(sizeof($request['interval']) != 7) {
				return MyResponse::show('Interval must contain whole week', 400);
			}

			$model = new Interval();

			$days = $model->getColumns();

			$count = 0;
	
			foreach($request['interval'] as $day => $i) {
				$count++;
				
				if($day != $days[$count]) {
					return MyResponse::show('Invalid day specified in interval', 400);
				}

				$timeBegin = substr($i, 0, strpos($i, ','));
				$timeEnd = substr($i, strpos($i, ',') + 1);

				if(!preg_match('/(2[0-3]|[01][0-9]):([0-5][0-9])/', $timeBegin)
					|| !preg_match('/(2[0-3]|[01][0-9]):([0-5][0-9])/', $timeEnd)) {
					return myresponse::show('Invalid time format', 400);	
				}

				$timeBegin = strtotime($timeBegin);
				$timeEnd = strtotime($timeEnd);

				if($timeBegin > $timeEnd) {
					return MyResponse::show('Starting time must be before ending time', 400);
				}
			}
			
			$interval = Interval::create($request['interval']);
			$request['interval'] = $interval->id;
	
			$columns = [
				'school',
				'subject',
				'level'
			];

			foreach($columns as $column) {
				$temp[$column] = explode(',', $request[$column . 's']);
				unset($request[$column . 's']);
			}
		}else {
			$temp['school'] = $request['school'];
			unset($request['school']);
		}
				
		$create = [];

		foreach($fields as $key => $value) {
			$create[$key] = $request[$key];
		}

		$create['password'] = $this->hashPassword($request['password']);
		$create['accessToken'] = $this->createToken();

		$user = User::create($create);
		
		if($request['type'] == 'mentor') {
			foreach($temp as $key => $value) {
				switch($key) {
					case 'school':
						$model = new School();
						break;
					case 'subject':
						$model = new Subject();
						break;
					case 'level';
						$model = new Level();
						break;
				}

				foreach($value as $entry) {
					if(Junction::where('user', $user->id)
						       ->where($key, $entry)
							   ->first()) {
						continue;	
					}
						
					if(!$model->where('id', $entry)->first()) {
						return MyResponse::show('Invalid ' . $key, 400);	
					}

					Junction::create([
						'user' => $user->id,
						$key => $entry
					]);
				}
			}
		}else {
			if(isset($request['school']) 
				&& !Junction::where('user', $user->id)
						       ->where('school', $request['school'])
							   ->first()) {

				if(School::where('id', $request['school'])->first()) {
					return MyResponse::show('Invalid school', 400);	
				}

				Junction::create([
					'user' => $user->id,
					'school' => $temp['school']
				]);
			}
		}

		return response()->json(User::find($user->id));
	} 
	
	public function update(Request $request) {
		$user = UsersController::currentUser();
		
		$fields = [
			'firstName',
			'lastName'
		];

		if($user->type == 'mentor') {
			$fields = array_merge($fields, [
				'interval',
				'price',
				'location',
				'promoted'
			]);

			$columns = [
				'school',
				'subject',
				'level'
			];

			foreach($columns as $column) {
				$key = $column . 's';

				if(isset($request[$key])) {
					if(empty($request[$key])) {
						return MyResponse::show($key . ' are required', 400);
					}

					$temp[$column] = explode(',', $request[$key]);
					
					Junction::where('user', $user->id)
							->whereNotNull($column)
							->delete();
				}
			}
			
			foreach($temp as $key => $value) {
				$model = null;
				
				switch($key) {
					case 'school':
						$model = new School();
						break;
					case 'subject':
						$model = new Subject();
						break;
					case 'level';
						$model = new Level();
						break;
				}

				foreach($value as $entry) {
					if(!$model->where('id', $entry)->first()) {
						return MyResponse::show('Invalid ' . $key, 400);	
					}

					Junction::create([
						'user' => $user->id,
						$key => $entry
					]);
				}
			}
		}else {
			if(isset($request['school'])) {
				if(empty($request['school'])) {
					return MyResponse::show('School is required', 400);
				}

				Junction::where('user', $user->id)
						->whereNotNull('school')
						->delete();

				if(!School::where('id', $request['school'])->first()) {
					return MyResponse::show('Invalid school', 400);	
				}

				Junction::create([
					'user' => $user->id,
					'school' => $request['school']
				]);
			}

			$fields = array_merge($fields, [
				'grade'
			]);
		}
				
		$edit = [];

		foreach($fields as $field) {
			$new = $request[$field];

			if(empty($new)) {
				continue;	
			}

			$edit[$field] = $new;
		}

		$company->update($company);
	
		return response()->json($user);
	}

	public function get($id) {
		$view = true;

		$user = User::findOrfail($id);
			
		if($user->id == UsersController::currentUser()->id) {
			$view = false;
		}

		foreach($user as $key => $value) {
			if(!isset($value) || empty($value)) {
				unset($user[$key]);	
			}
		}
			if($view) {
				$user->increment('views');	
			}
		}else {
			$user['school'] = Junction::with('school')
								      ->where('user', $id)
								      ->whereNotNull('school')
								      ->first();
		}

		return response()->json($user);
	}
	
	public function all() {
		return response()->json(Company::all());	
	}

	public function delete($id) {
		Company::findOrfail($id)->delete();
		
		return MyResponse::show('Success', 200);
	}
}
?>
