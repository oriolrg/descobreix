<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Items;
use App\Dies;
use App\visitesRestaurant;
use App\consultesDia;
use App\consultesHora;
/** retorna dades utils per app
     * @param Request $request
     * @return mixed
     */
class proveidorRestaurantController extends Controller
{

    //proveeix dades dels restaurants
    public function proveidor(){
      $hoy = getdate();
      //return Restaurant::all(),Items::all();
      $data = collect(Restaurant::where('actiu', 1)->inRandomOrder()->get());

      //return $hoy;
      return $data;
    }

    public function proveidorItem($id){
      //$id = 2;

      $data = collect(Items::where('idRestaurant', $id)->get());
      visitesRestaurant::where('idRestaurant', $id)->increment('countVisitaRestaurant');

      return $data;
    }
    public function proveidorDia($dia){
      consultesDia::where('dia', $dia)->increment('countDia');
      switch ($dia) {
        case '1':
            $data = collect(Dies::where('dilluns', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '2':
            $data = collect(Dies::where('dimarts', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '3':
            $data = collect(Dies::where('dimecres', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '4':
            $data = collect(Dies::where('dijous', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '5':
            $data = collect(Dies::where('divendres', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '6':
            $data = collect(Dies::where('dissabte', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
        case '7':
            $data = collect(Dies::where('diumenge', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurants($data);
          break;
      }
    }
    public function proveidorHora($hora){
        consultesHora::where('hora', $hora)->increment('countHores');
        $Restaurant = new Restaurant();
        return $Restaurant->seleccionarRestaurantHora($hora);
    }
    public function proveidorDiaHora($dia,$hora){
      consultesDia::where('dia', $dia)->increment('countDia');
      consultesHora::where('hora', $hora)->increment('countHores');
      switch ($dia) {
        case '1':
            $data = collect(Dies::where('dilluns', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '2':
            $data = collect(Dies::where('dimarts', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '3':
            $data = collect(Dies::where('dimecres', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '4':
            $data = collect(Dies::where('dijous', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '5':
            $data = collect(Dies::where('divendres', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '6':
            $data = collect(Dies::where('dissabte', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurantDiaHora($data,$hora);
          break;
        case '7':
            $data = collect(Dies::where('diumenge', 1)->select('id')->get());
            $Restaurant = new Restaurant();
            return $Restaurant->seleccionarRestaurant($data,$hora);
          break;
      }
    }


}
