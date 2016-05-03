<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\CompanyModel;
use App\Model\CommentModel;
use App\Model\HistoryModel;
use App\Http\Controllers\Controller;
use DB;
use Request;
use Validator;

class CompanyController extends Controller
{
  /**
   * Company constructor.
   */
  public function __construct()
  {

  }


  /**
   *  display all companies
   */
  public function index(){
//p(time(), 1);
    $company = CompanyModel::select( '*', 'history.reminder as reminder', 'history.employee_id as employee_id', 	'history.text as comment')
      ->leftJoin('history',
        function($join)
        {
          $join->on('company.id', '=', 'history.company_id')
            ->where('history.reminder', '>', time());
        }
      )
      ->orderBy('reminder', 'asc')
      ->get();
//    p($company,1);
    return view('company.view', [
      'companies' => $company
    ]);
  }


  /**
   * form to add new company and add company
   * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function addCompany(){
    $data = Request::all();
    if($data){
      $validator = Validator::make($data, [
        'name' => 'required|max:255',
        'form_of' => 'required|max:255',
        'address' => 'required|max:255',
        'phone' => 'max:11',
        'rating' => 'integer|max:20',
      ]);

      if($validator->fails()){
          return '';
      }

      CompanyModel::create($data);
    }
  }

  /**
   * detail page company
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function detailCompany($id) {
    $company = CompanyModel::find($id);
    return view('company.detail', ['company' => $company]);
  }

  /**
   * history page company
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function historyCompany($id) {
    return view('company.history', [
      'company' => CompanyModel::find($id)
    ]);
  }


  /**
   * Add comment to History Company
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function addCommentToHistory() {

    $data = Request::all();

    $validator = Validator::make($data, [
      'price' => 'mimes:pdf,jpg,jpeg',
      'record' => 'mimes:wav',
    ]);

    if($validator->fails()){
      echo 'error';
      return '';
    }

    /** save price */
    if (Request::file('price')) {

      $priceDir = 'uploads/price/' . date('Y-m');
      if (!file_exists($priceDir)) {
        mkdir($priceDir, 0777, true);
      }

      $price = Request::file('price')->getClientOriginalExtension();
      $price = Request::file('price')->move($priceDir, date("Y-m-d h:i:sa") . '.' . $price);

      $data['price'] = $price->getPathname();
    }

    /** save record */
    if (Request::file('record')) {
      $recordDir = 'uploads/record/' . date('Y-m');
      if (!file_exists($recordDir)) {
        mkdir($recordDir, 0777, true);
      }

      $record = Request::file('record')->getClientOriginalExtension();
      $record = Request::file('record')->move($recordDir, date("Y-m-d h:i:sa") . '.' . $record);
      $data['record'] = $record->getPathname();
    }

    $id = HistoryModel::create($data);
    if ($id) {
      if (Request::ajax())
      {
        echo 'done';
        exit;
      }
    }

    return '';
  }





}
