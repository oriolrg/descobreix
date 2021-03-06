<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Items;
use App\visitesRestaurant;

class Restaurant extends Model
{
    //
    protected $table = 'restaurants';
    protected $primaryKey = 'id';

    public function insertRestaurant(Collection $nouRestaurant){
        //return $nouRestaurant->get('nom');
        $this->nom = $nouRestaurant->get('nom');
        $this->telefon = $nouRestaurant->get('telefon');
        $this->direccio = $nouRestaurant->get('direccio');
        $this->poblacio = $nouRestaurant->get('poblacio');
        $this->soci = $nouRestaurant->get('soci');
        $this->preu = $nouRestaurant->get('preuMitja');
        $this->obertura_dia = $nouRestaurant->get('obertura_dia');
        $this->tancament_dia = $nouRestaurant->get('tancament_dia');
        $this->obertura_nit = $nouRestaurant->get('obertura_nit');
        $this->tancament_nit = $nouRestaurant->get('tancament_nit');
        $this->imatgePrincipal = $nouRestaurant->get('imatge1');
        $this->imatgeSecundaria = $nouRestaurant->get('imatge2');
        $this->save();
        return True;
    }
    public function updateRestaurant(Collection $nouRestaurant, $id){
        //return $nouRestaurant->get('nom');
        if($nouRestaurant->get('imatge1')&&$nouRestaurant->get('imatge2')){
          $this->where('id', $id)->update(
            [
              'nom' => $nouRestaurant->get('nom'),
              'telefon' => $nouRestaurant->get('telefon'),
              'direccio' => $nouRestaurant->get('direccio'),
              'poblacio' => $nouRestaurant->get('poblacio'),
              'soci' => $nouRestaurant->get('soci'),
              'preu' => $nouRestaurant->get('preuMitja'),
              'obertura_dia' => $nouRestaurant->get('obertura_dia'),
              'tancament_dia' => $nouRestaurant->get('tancament_dia'),
              'obertura_nit' => $nouRestaurant->get('obertura_nit'),
              'tancament_nit' => $nouRestaurant->get('tancament_nit'),
              'imatgePrincipal' => $nouRestaurant->get('imatge1'),
              'imatgeSecundaria' => $nouRestaurant->get('imatge2'),
            ]
          );
        }elseif($nouRestaurant->get('imatge1')){
          $this->where('id', $id)->update(
            [
              'nom' => $nouRestaurant->get('nom'),
              'telefon' => $nouRestaurant->get('telefon'),
              'direccio' => $nouRestaurant->get('direccio'),
              'poblacio' => $nouRestaurant->get('poblacio'),
              'soci' => $nouRestaurant->get('soci'),
              'preu' => $nouRestaurant->get('preuMitja'),
              'obertura_dia' => $nouRestaurant->get('obertura_dia'),
              'tancament_dia' => $nouRestaurant->get('tancament_dia'),
              'obertura_nit' => $nouRestaurant->get('obertura_nit'),
              'tancament_nit' => $nouRestaurant->get('tancament_nit'),
              'imatgePrincipal' => $nouRestaurant->get('imatge1'),
            ]
          );
        }
        if($nouRestaurant->get('imatge2')){
          $this->where('id', $id)->update(
            [
              'nom' => $nouRestaurant->get('nom'),
              'telefon' => $nouRestaurant->get('telefon'),
              'direccio' => $nouRestaurant->get('direccio'),
              'poblacio' => $nouRestaurant->get('poblacio'),
              'soci' => $nouRestaurant->get('soci'),
              'preu' => $nouRestaurant->get('preuMitja'),
              'obertura_dia' => $nouRestaurant->get('obertura_dia'),
              'tancament_dia' => $nouRestaurant->get('tancament_dia'),
              'obertura_nit' => $nouRestaurant->get('obertura_nit'),
              'tancament_nit' => $nouRestaurant->get('tancament_nit'),
              'imatgeSecundaria' => $nouRestaurant->get('imatge2'),
            ]
          );
        }
        else{
          $this->where('id', $id)->update(
            [
              'nom' => $nouRestaurant->get('nom'),
              'telefon' => $nouRestaurant->get('telefon'),
              'direccio' => $nouRestaurant->get('direccio'),
              'poblacio' => $nouRestaurant->get('poblacio'),
              'soci' => $nouRestaurant->get('soci'),
              'preu' => $nouRestaurant->get('preuMitja'),
              'obertura_dia' => $nouRestaurant->get('obertura_dia'),
              'tancament_dia' => $nouRestaurant->get('tancament_dia'),
              'obertura_nit' => $nouRestaurant->get('obertura_nit'),
              'tancament_nit' => $nouRestaurant->get('tancament_nit'),
            ]
          );
        }

        return True;
    }
    /** Llista tots els accessos
     * @return mixed
     */
    public function getRestaurant(){
        //comprobar format hora
        return $this->orderBy('id', 'asc');
        //llista errors borrats, no utilitzat
        //return $this->where('borrat',0)->orderBy('data_acces', 'desc');
    }
    public function getVisitesRestaurant(){
        //return "hola";
        return $this->leftJoin('visites_restaurant',  'restaurants.id', '=', 'visites_restaurant.idRestaurant');

    }
    public function seleccionarRestaurant($id){
        //TODO afegir contador quan s'accedeix a la consulta del restaurant

        return $this->where('id', $id)->get();

    }
    public function seleccionarRestaurants($id){
        return $this->whereIn('id', $id)->inRandomOrder()->get();

    }
    public function seleccionarRestaurantHora($hora){
        return $this->where('obertura_dia', '<=', $hora)->where('tancament_dia', '>', $hora)->orWhere('obertura_nit', '<=', $hora)->where('tancament_nit', '>', $hora)->inRandomOrder()->get();

    }
    public function seleccionarRestaurantDiaHora($id,$hora){
        return $this->whereIn('id', $id)->where('obertura_dia', '<=', $hora)->where('tancament_dia', '>', $hora)->orWhereIn('id', $id)->where('obertura_nit', '<=', $hora)->where('tancament_nit', '>', $hora)->inRandomOrder()->get();

    }
    public function desactivarRestaurant($id){

        $this->where('id', $id)->where('actiu' , 1)->update(['actiu' => 0]);
        return "des";

    }
    public function activarRestaurant($id){

        $this->where('id', $id)->where('actiu' , 0)->update(['actiu' => 1]);
        //return "act";

    }
    public function borrarRestaurant($id){
        $this->where('id', $id)->delete();
    }
    public function item()
    {
        return $this->hasOne('App\Items');
    }
}
