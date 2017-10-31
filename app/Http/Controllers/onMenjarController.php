<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class onMenjarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *Administració general on menjar
     *
     */
    public function index()
    {
        return view('onMenjar/onMenjaradmin');
    }

    /**
     *
     *Afegir restaurant
     *
     */
    public function onMenjaradd(Request $request)
    {
        return view('onMenjar/onMenjaradd');

    }
    public function onMenjarpost(Request $request)
    {
        //TODO Validar formulari
        $json = $request->input();
        $datos = json_decode(json_encode($json), true);
        //echo $datos;
        //return implode(",",$request->Items);
        $nouRestaurant = collect([
            'nom' => $datos["nomestabliment"],
            'telefon' => $datos["telefon"],
            'preuMitja' => $datos["preumig"],
            'horariMati' => $datos["horariMati"],
            'horariMigdia' => $datos["horariMigdia"],
            'horariNit' => $datos["horariNit"],
            'items' => implode(",",$request->Items),
            'imatge' => $datos["file"]
        ]);
        $Restaurant = new Restaurant();
        //insertar nou restaurant
        //TODO falta configurar resposta necessaria
        if($Restaurant->insertRestaurant($nouRestaurant)==true)
        {
            return "Ok";
        };



    }

    /**
     *
     *Borrar restaurant
     *
     */
    public function onMenjardell()
    {
        return view('onMenjar/onMenjardell');
    }
    /**
     *
     *Modificar restaurant
     *
     */
    public function onMenjarmod()
    {
        return view('onMenjar/onMenjarmod');
    }

}
