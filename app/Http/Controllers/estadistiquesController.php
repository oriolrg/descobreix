<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consultesHora;
use App\consultesDia;
use App\consultesApp;
use App\visitesRestaurant;

class estadistiquesController extends Controller
{
    public function reiniciarContadors()
    {
        $consultesHora = new consultesHora();
        $consultesHora->reiniciarContador();
        $consultesDia = new consultesDia();
        $consultesDia->reiniciarContador();
        $consultesApp = new consultesApp();
        $consultesApp->reiniciarContador();
        $visitesRestaurant = new visitesRestaurant();
        $visitesRestaurant->reiniciarContador();
        return 1;
    }
}
