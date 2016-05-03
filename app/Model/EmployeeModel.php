<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_id', 'position', 'name', 'middle_name', 'surname', 'phone', 'email', 'birthday', 'comment'
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'employee';



}
