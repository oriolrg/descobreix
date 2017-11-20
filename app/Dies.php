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
      if($dies){
        foreach ($dies as $dia) {
          //actualitzo valord seleccionats
          $this->$dia = True;
        }
      }

      $this->save();
      return True;
  }
  public function updateDies($Dies, $id){
    //return $Items;
    $this->where('id', $id)->update(
      [
        'dilluns' => False,
        'dimarts' => False,
        'dimecres' => False,
        'dijous' => False,
        'divendres' => False,
        'dissabte' => False,
        'diumenge' => False,
      ]
    );
    if($Dies){foreach ($Dies as $dia) {
          $this->where('id', $id)->update(
            [
              $dia => True,
            ]
          );
      }
    }
    return True;
  }
  public function seleccionarDia($id){
    return $this->where('idRestaurant', $id)->get();
  }
  public function borrarDia($id){
      $this->where('idRestaurant', $id)->delete();
  }
}
