<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Items;
use App\Horari;
use App\Dies;
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
            'direccio' => $datos["direccio"],
            'poblacio' => $datos["poblacio"],
            'preuMitja' => $datos["preumig"],
            'obertura_dia' => $datos["horariDiaDe"],
            'tancament_dia' => $datos["horariDiaA"],
            'obertura_nit' => $datos["horariNitDe"],
            'tancament_nit' => $datos["horariNitA"],
            'imatge1' => $nomprincipal,
            'imatge2' => $nomsecundari
        ]);
        $items = collect();
        //return $request->Items;
        foreach ($request->Items as $item){
          $items->put($item, "checkmark-circle");
        }

        //TODO crear model i afegir a bbdd
        $dies = collect();
        //return $request;
        foreach ($request->Dies as $dia){
          $dies->put($dia, $dia);
        }

        //return $dies;

        $Restaurant = new Restaurant();
        $Item = new Items();

        $Dies = new Dies();
        //return $Item->insertItem($request->Items);
        //return $request->Items;
        //insertar nou restaurant
        //TODO falta configurar resposta necessaria

        if($Restaurant->insertRestaurant($nouRestaurant))
        {
            //$restaurant = Restaurant::find(Input::get('id'));
            if($Dies->insertDia($dies)){
                if($Item->insertItem($request->Items)==true){
                    return view('onMenjar/onMenjaradd');
                }
            }
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
