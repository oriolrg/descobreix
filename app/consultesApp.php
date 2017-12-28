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
}
