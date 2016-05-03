<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Model\BuildingObjectModel;
use App\Model\EmployeeModel;

class BuildingObjectController extends Controller
{
  /**
   * add new Physical Address to Company
   * @return $this
   */
  public function addBuildingObject(){
    $data = Request::all();
    if($data){
      $validator = Validator::make($data, [
        'company_id' => 'required',
        'address' => 'required|max:255',
      ]);

      if($validator->fails()){
        return '';
      }

      $id = BuildingObjectModel::create($data);
      if ($id) {
        if (Request::ajax())
        {
          $employee = EmployeeModel::find($data['employee_id']);
          $data['employee_id'] = $employee->name . " " . $employee->middle_name . " " . $employee->surname;
          $results = array(
            'status' => 'done',
            'message' => $data,
          );
          return response()->json($results);
        }
      }
    }
  }
}
