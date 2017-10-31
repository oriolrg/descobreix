<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Restaurant extends Model
{
    //
    protected $table = 'restaurants';
    protected $primaryKey = 'id';

    public function insertRestaurant(Collection $nouRestaurant){
        //return $nouRestaurant->get('nom');
        $this->nom = $nouRestaurant->get('nom');
        $this->telefon = $nouRestaurant->get('telefon');
        $this->preu = $nouRestaurant->get('preuMitja');
        $this->horariDia = $nouRestaurant->get('horariDia');
        $this->horariNit = $nouRestaurant->get('horariNit');
        //$this->horariNit = $nouRestaurant->get('horariNit');
        $this->items = $nouRestaurant->get('items');
        $this->imatgePrincipal = $nouRestaurant->get('imatge1');
        $this->imatgeSecundaria = $nouRestaurant->get('imatge2');
        $this->save();
        return True;
    }
}
