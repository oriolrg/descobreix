<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultesHora extends Model
{
  protected $table = 'consultes_hora';
  public $timestamps = false;
  public function getConsultesHora(){
      return $this->orderBy('id', 'asc');
  }
  public function reiniciarContador(){
      $consultesHora = $this->all();
      foreach ($consultesHora as $key => $hora) {
          $this->where('id', $hora->id)
          ->update(['countHores' => 0]);
      }

  }
}
