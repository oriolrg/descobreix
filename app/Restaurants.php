<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = ['nom'];
    public function insertarRestaurant(Colection $restaurant)
    {
        $this->nom = $restaurant->get(nom);
        $this->telefon = $restaurant->get(telefon);
        $this->preu = $restaurant->get(horariMmati);
        //TODO Borrar
    }
}
