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
        //return $request;
        $fileprincipal = $request->file('file1');
        $filesecundari = $request->file('file2');

        //obtenir nom imatge principal i secundaria
        $nomprincipal = $fileprincipal->getClientOriginalName();
        $nomsecundari = $filesecundari->getClientOriginalName();

        //Guardat imatges en local
        \Storage::disk('local')->put($nomprincipal,  \File::get($fileprincipal));
        \Storage::disk('local')->put($nomsecundari,  \File::get($filesecundari));


        $json = $request->input();
        $datos = json_decode(json_encode($json), true);
        //Preparació dades bbdd
        $nouRestaurant = collect([
            'nom' => $datos["nomestabliment"],
            'telefon' => $datos["telefon"],
            'preuMitja' => $datos["preumig"],
            'horariDia' => $datos["horariDiaDe"].$datos["horariDiaA"],
            'horariNit' => $datos["horariNitDe"].$datos["horariNitA"],
            //'horariNit' => $datos["horariNitDe"].$datos["horariNitA"],
            'items' => implode(",",$request->Items),
            'imatge1' => $nomprincipal,
            'imatge2' => $nomsecundari
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
