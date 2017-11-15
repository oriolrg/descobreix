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

        //return $restaurants;
        return view('onMenjar/onMenjaradmin');
    }
    /** Crida el model per llistar tots els accessos
         * @return mixed
         */
    public function llistarRestaurants()
    {
        $restaurant = new Restaurant();
        //Es pagina el resultat
        $restaurants = $restaurant->getRestaurant()->paginate(15);
        return $restaurants;
    }
    /**
     *
     *Afegir restaurant
     *
     */
    public function onMenjaradd()
    {
        $restaurants = $this->llistarRestaurants();
        return view('onMenjar/onMenjaradd')->with('restaurants', $restaurants);

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
                    return redirect()->back();
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
    public function desactivarRestaurant($id){

        $Restaurant = new Restaurant();
        $Restaurant->desactivarRestaurant($id);
        return redirect()->back();
    }
    public function activarRestaurant($id){
        //return $request;
        $Restaurant = new Restaurant();
        $Restaurant->activarRestaurant($id);
        return redirect()->back();
    }
    public function borrarRestaurant($id){
        $Restaurant = new Restaurant();
        $Restaurant->borrarRestaurant($id);
        return redirect()->back();
    }

}
