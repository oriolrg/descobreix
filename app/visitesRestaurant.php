<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitesRestaurant extends Model
{
  protected $table = 'visites_restaurant';
  public $timestamps = false;
  public function insertFirstVisit(){
      $lastRestaurant = Restaurant::orderBy('id', 'desc')->first();
      $this->idRestaurant = $lastRestaurant->id;

      $this->save();
      return True;
  }
  public function borrarRestaurantVisita($id){
      return $this->where('idRestaurant', $id)->delete();
  }
}
