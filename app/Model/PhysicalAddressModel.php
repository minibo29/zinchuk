<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhysicalAddressModel extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_id', 'address'
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'physical_address';


}
