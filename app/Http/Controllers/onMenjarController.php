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

        //separem camp fitxer
        $file = $request->file('file');

        //obtenir nom
        $nom = $file->getClientOriginalName();

        //Guardat imatge en local
        \Storage::disk('local')->put($nom,  \File::get($file));


        $json = $request->input();
        $datos = json_decode(json_encode($json), true);
        //Preparació dades bbdd
        $nouRestaurant = collect([
            'nom' => $datos["nomestabliment"],
            'telefon' => $datos["telefon"],
            'preuMitja' => $datos["preumig"],
            'horariMati' => $datos["horariMati"],
            'horariMigdia' => $datos["horariMigdia"],
            'horariNit' => $datos["horariNit"],
            'items' => implode(",",$request->Items),
            'imatge' => $nom
        ]);

        $Restaurant = new Restaurant();
        //insertar nou restaurant
        //TODO falta configurar resposta necessaria
        if($Restaurant->insertRestaurant($nouRestaurant)==true)
        {
            return view('onMenjar/onMenjaradd');
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
