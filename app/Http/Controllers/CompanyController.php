<?php 

namespace App\Http\Controllers;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller { 
	
	public function create(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'domain' => 'required'
		]);
	
		$request['plan'] = Plan::create();
		$request['owner'] = UserController::current();

		$company = Company::create($request->all());
		
		return response()->json($company);
	}
	
	public function update($id) {
		$company = Company::findOrfail($id);
		
		return response('Success', 200);
	}

	public function get($id) {
		$company = Company::with('plan', 'owner')->findOrFail($id);

		return response()->json($company);	
	}

	public function all() {
		return response()->json(Company::with('plan', 'owner')->get());
	}
	
	public function delete($id) {
		Company::findOrfail($id)->delete();
		
		return response('Success', 200);
	}
}
?>
