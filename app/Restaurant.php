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
        $this->horariMati = $nouRestaurant->get('horariMati');
        $this->horariMigdia = $nouRestaurant->get('horariMigdia');
        $this->horariNit = $nouRestaurant->get('horariNit');
        $this->items = $nouRestaurant->get('items');
        $this->imatgePrincipal = $nouRestaurant->get('imatge');
        $this->save();
        return True;
    }
}
