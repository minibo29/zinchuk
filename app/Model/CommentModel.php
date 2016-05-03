<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'entity', 'entity_id', 'text', 'price', 'record', 'reminder',
  ];


  /**
   * The table name.
   *
   * @var array
   */
  protected $table = 'comment';

  /**
   * get Contact employee
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmployee()
  {
    return $this->belongsTo('App\Model\EmployeeModel');
  }
}
