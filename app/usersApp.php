<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersApp extends Model
{
  protected $table = 'users_app';
  public $timestamps = false;
  protected $primaryKey = 'id';
  public function countUsers(){
    return $this->count();
  }
  public function mitjanaUsers(){
    $unicUsers = $this->count();
    $accesUser = $this->sum('connexions');
    return $accesUser/$unicUsers;
  }
}
