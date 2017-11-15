<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use Illuminate\Support\Collection;

class Horari extends Model
{

  protected $table = 'horari_obertura';
  public $timestamps = false;
  public function insertHorari(Collection $nouHorari){
      //Recuperem e insertem la ide del restaurant que li correspon
      $lastRestaurant = Restaurant::orderBy('id', 'desc')->first();
      $this->idRestaurant = $lastRestaurant->id;
      $this->obertura_dia = $nouHorari->get('obertura_dia');
      $this->tancament_dia = $nouHorari->get('tancament_dia');
      $this->obertura_nit = $nouHorari->get('obertura_nit');
      $this->tancament_nit = $nouHorari->get('tancament_nit');

      $this->save();
      return True;
  }
}
