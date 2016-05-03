<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\EmployeeModel;
use Request;
use Validator;
use DB;

class EmployeeController extends Controller
{


  /**
   * add new Employee to Company
   * @return $this
   */
  public function addEmployee(){
    $data = Request::all();
    if($data){
      $validator = Validator::make($data, [
        'company_id' => 'required',
        'position' => 'required|max:255',
        'name' => 'required|max:255',
        'middle_name' => 'required|max:255',
        'surname' => 'max:255',
        'email' => 'max:255',
        'contact_employee' => 'integer|max:10',
        'birthdate' => 'max:255',
        'comment' => 'max:255',
      ]);

      if($validator->fails()){
        return '';
      }

      $id = EmployeeModel::create($data);
      if ($id) {
        if (Request::ajax())
        {
          $results = array(
            'status' => 'done',
            'message' => $data,
          );
          return response()->json($results);
        }
      }
    }
  }

  public function autoloadEmployee(){
    $data = Request::all();

    $results = array();

    $employees = EmployeeModel::select(array('id', DB::raw('concat(name," ",middle_name," ",surname) as name')))
      ->where('company_id','=',$data['company_id'])
      ->where(DB::raw('concat(name," ",middle_name," ",surname)'), 'like', "%" . $data['q'] . "%")
      ->lists('name', 'id');
   foreach ($employees as $k => $v) {
     $results[] = ['id' => $k, 'value' => $v ];
   }

    $results = array(
      "results" => $results,
      "pagination" => array(
        "more" => false
      )
    );
    return response()->json($results);
  }


}
