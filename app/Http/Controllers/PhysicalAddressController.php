<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Model\PhysicalAddressModel;

class PhysicalAddressController extends Controller
{

  /**
   * add new Physical Address to Company
   * @return $this
   */
  public function addPhysicalAddress(){
    $data = Request::all();
    if($data){
      $validator = Validator::make($data, [
        'company_id' => 'required',
        'address' => 'required|max:255',
      ]);

      if($validator->fails()){
        return '';
      }

      $id = PhysicalAddressModel::create($data);
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

}
