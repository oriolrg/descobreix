<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultesDia extends Model
{
  protected $table = 'consultes_dia';
  public $timestamps = false;
  public function getConsultesDia(){
      //comprobar format hora
      return $this->orderBy('id', 'asc');
      //llista errors borrats, no utilitzat
      //return $this->where('borrat',0)->orderBy('data_acces', 'desc');
  }
}
