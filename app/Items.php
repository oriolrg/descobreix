<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Restaurant;

class Items extends Model
{
  public function insertItem($nouItem){
      //Recuperem e insertem la ide del restaurant que li correspon
      $lastRestaurant = Restaurant::orderBy('id', 'desc')->first();
      $this->idRestaurant = $lastRestaurant->id;
      $this->Menu = "close-circle";
      $this->MenuInfantil = "close-circle";
      $this->Carta = "close-circle";
      $this->CuinaCatalana = "close-circle";
      $this->Pizza = "close-circle";
      $this->PlatsCombinats = "close-circle";
      $this->Entrepans = "close-circle";
      $this->ApteCeliacs = "close-circle";
      $this->Terrasa = "close-circle";
      $this->ZonaEsbarjo = "close-circle";
      foreach ($nouItem as $Item) {
        //actualitzo valord seleccionats
        $this->$Item = "checkmark-circle";
      }

      $this->save();
      return True;
  }
}
