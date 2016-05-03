<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_id', 'employee_id','text', 'price', 'record', 'reminder',
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'history';

  /**
   * get Contact employee
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmployee()
  {
    return $this->belongsTo('App\Model\EmployeeModel', 'employee_id') ;
  }
}
