<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Items;

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
    /** Llista tots els accessos
     * @return mixed
     */
    public function getRestaurant(){
        //comprobar format hora
        return $this->orderBy('id', 'asc');
        //llista errors borrats, no utilitzat
        //return $this->where('borrat',0)->orderBy('data_acces', 'desc');
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
}
