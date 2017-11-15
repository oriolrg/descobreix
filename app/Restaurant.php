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

}
