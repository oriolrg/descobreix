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
      $this->Brasa = "close-circle";
      $this->Terrasa = "close-circle";
      $this->Tapes = "close-circle";
      //return $nouItem;
      if($nouItem){
        foreach ($nouItem as $Item) {
          //actualitzo valord seleccionats
          $this->$Item = "checkmark-circle";
        }
      }

      $this->save();
      return True;
  }
  public function updateItem($Items, $id){
    //return $Items;
    $this->where('id', $id)->update(
      [
        'Menu' => "close-circle",
        'MenuInfantil' => "close-circle",
        'Carta' => "close-circle",
        'CuinaCatalana' => "close-circle",
        'Pizza' => "close-circle",
        'PlatsCombinats' => "close-circle",
        'Entrepans' => "close-circle",
        'Brasa' => "close-circle",
        'Terrasa' => "close-circle",
        'Tapes' => "close-circle",
      ]
    );
    if($Items){foreach ($Items as $Item) {
          $this->where('id', $id)->update(
            [
              $Item => "checkmark-circle",
            ]
          );
      }
    }
    return True;
  }
  public function seleccionarItem($id){
    return $this->where('idRestaurant', $id)->get();
  }
  public function borrarItem($id){
      return $this->where('idRestaurant', $id)->delete();
  }
}
