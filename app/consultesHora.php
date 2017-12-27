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
}
