<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Circuits;
use App\Items;
use App\Dies;
use App\visitesRestaurant;
use App\consultesDia;
use App\consultesHora;
use App\consultesApp;
use App\usersApp;
/** retorna dades utils per app
     * @param Request $request
     * @return mixed
     */
class proveidorGeolordController extends Controller
{


    //proveeix dades dels restaurants amb uuid
    public function proveidorCircuit($lat, $lon){
      //TODO calcular distancies als diferents circuits i retornar els 5 mes proxims
      $data = DB::table('circuits')->get();
      foreach ($data as $circuit) {
        $latitudDesti = $circuit->latitud;
        $longitudDesti = $circuit->longitud;
        $distancia = $this->distance($lat, $lon,$latitudDesti, $longitudDesti, 'M');
        $circuitdata=Collect($circuit);
        $circuitdata->put('distancia',$distancia[0]);
        $circuitdata->put('angle',$distancia[1]);
      }
      //$this->distance($lat, $lon,);
      return $data;
    }


    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      $x = $lat1 - $lat2;
      $y = $lon1 - $lon2;
      $alfa = rad2deg(atan($y/$x));

      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        }else if ($unit == "M") {
          return [($miles * 160.9344), $alfa];
        } else {
            return $miles;
          }
    }




}
