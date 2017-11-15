<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Restaurant;

class Dies extends Model
{
  protected $table = 'dies_obertura';
  public $timestamps = false;
  public function insertDia($dies){
      $lastRestaurant = Restaurant::orderBy('id', 'desc')->first();
      $this->idRestaurant = $lastRestaurant->id;

      foreach ($dies as $dia) {
        //actualitzo valord seleccionats
        $this->$dia = True;
      }
      $this->save();
      return True;
  }
}
