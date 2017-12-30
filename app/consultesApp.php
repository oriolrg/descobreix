<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultesApp extends Model
{
  protected $table = 'consultes_app';
  public $timestamps = false;
  public function getConsultesHora(){
      return $this->orderBy('id', 'asc');
  }

  /**
  *Actualitza el contador a 0
  */
  public function reiniciarContador(){
    $this->where('id', 1)
         ->update(['count_accessos' => 0]);
  }
}
