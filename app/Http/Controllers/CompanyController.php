<?php 

namespace App\Http\Controllers;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller { 
	
	public function create(Request $request) {
		$fields = [
			'name' => 'required',
			'domain' => 'required'
		];

		$this->validate($request, $fields);

		$company = Company::create($request->all());
	}
	
	public function update($id) {
		$company = Company::findOrfail($id);
		
		return response('Success', 200);
	}

	public function get($id) {
		return Company::findOrfail($id);
	}

	public function all() {
		return response()->json(Company::all());	
	}
	
	public function delete($id) {
		Company::findOrfail($id)->delete();
		
		return response('Success', 200);
	}
}
?>
