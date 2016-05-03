<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'form_of', 'address', 'phone', 'contact_employee', 'rating',
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'company';


  /**
   * get Employees
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmployees()
  {
    return $this->hasMany('App\Model\EmployeeModel', 'company_id');
  }


  /**
   * get Physical Address
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getPhysicalAddress()
  {
    return $this->hasMany('App\Model\PhysicalAddressModel','company_id');
  }


  /**
   * get Building Objects
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getBuildingObjects()
  {
    return $this->hasMany('App\Model\BuildingObjectModel','company_id');
  }


  /**
   * get History comment
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getHistory()
  {
    return $this->hasMany('App\Model\HistoryModel','company_id');
  }


  /**
   * get Contact employee
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmployee()
  {
    return $this->belongsTo('App\Model\EmployeeModel', 'employee_id') ;
  }

}
