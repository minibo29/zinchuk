<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\EmployeeModel;

class BuildingObjectModel extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_id', 'name', 'address', 'employee_id',
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'building_object';

  /**
   * get Contact employee
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmployee()
  {
    return $this->belongsTo('App\Model\EmployeeModel', 'employee_id') ;
  }
}
