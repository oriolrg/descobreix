<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Items;

class proveidorRestaurantController extends Controller
{

    //proveeix dades dels restaurants
    public function proveidor(){
      $hoy = getdate();
      //return Restaurant::all(),Items::all();
      $data = collect(Restaurant::all());

      //return $hoy;
      return $data;
    }

    public function proveidorItem($id){
      //$id = 2;

      $data = collect(Items::where('idRestaurant', $id)->get());

      return $data;
    }

}
