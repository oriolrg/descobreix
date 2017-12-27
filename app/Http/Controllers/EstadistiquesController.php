<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitesRestaurant;
use App\consultesDia;
use App\consultesHora;

class EstadistiquesController extends Controller
{
    //
    public function addHorari(Request $request){

    }
    public function addDia(Request $request){

    }
    public function reset(){
      return consultesDia::get();
    }
}
