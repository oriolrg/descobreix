<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Circuits extends Model
{
    protected $fillable = ['nom'];
    public function insertarCircuit(Collection $noucircuit)
    {
        $this->nom = $noucircuit->get('nom');
        $this->latitud = $noucircuit->get('latitud');
        $this->longitud = $noucircuit->get('longitud');
        $this->poblacio = $noucircuit->get('poblacio');
        $this->imatgePrincipal = $noucircuit->get('imatge1');
        $this->save();
        return True;
    }
    public function getCircuits(){
        return $this->orderBy('id', 'asc');
    }
}
