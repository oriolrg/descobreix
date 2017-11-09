<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class proveidorRestaurantController extends Controller
{
    //proveeix dades dels restaurants
    public function proveidor(){
      $data = collect(Restaurant::all());
      return $data;
    }

}
