<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Items;
use App\Horari;
use App\Dies;
use App\visitesRestaurant;
use App\consultesDia;
use App\consultesHora;
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
        //TODO afegir mostra restaurants amb numero visites
        //return $restaurants;
        $restaurant = new Restaurant();
        //Es pagina el resultat
        $restaurants = $restaurant->getVisitesRestaurant()->paginate(40);
        //$horari = new consultesHora();
        $horaris = consultesHora::get();
        $dies = consultesDia::get();
        //return $restaurants-;
        return view('onMenjar/onMenjaradmin')->with('restaurants', $restaurants)->with('horaris', $horaris)->with('dies', $dies);
    }
    /** Crida el model per llistar tots els accessos
         * @return mixed
         */
    public function llistarRestaurants()
    {
        $restaurant = new Restaurant();
        //Es pagina el resultat
        $restaurants = $restaurant->getRestaurant()->paginate(55);
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
        $Restaurant = new Restaurant();
        $Item = new Items();
        $Dies = new Dies();
        $Visites = new visitesRestaurant();
        //return $Item->insertItem($request->Items);
        //return $request->Items;
        //insertar nou restaurant
        //TODO falta configurar resposta necessaria
        //return $Item->insertItem($request->Items);
        if($Restaurant->insertRestaurant($nouRestaurant))
        {
            //$restaurant = Restaurant::find(Input::get('id'));
            if($Dies->insertDia($request->Dies)){
                if($Item->insertItem($request->Items)==true){
                    $Visites->insertFirstVisit();
                    return redirect('/onmenjar/add');
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
    public function onMenjarmod(Request $request)
    {
        $restaurant = new Restaurant();
        $item = new Items();
        $dies = new Dies();
        //$items = new Item();
        //$dies = new Dies();

        $dataRestaurant = $restaurant->seleccionarRestaurant($request->input('id_restaurant'));
        $dataItem = $item->seleccionarItem($request->input('id_restaurant'));
        $dataDia = $dies->seleccionarDia($request->input('id_restaurant'));
        //return $dataDia;
        return view('onMenjar/onMenjarmod')->with('dataRestaurant',$dataRestaurant)->with('dataItem',$dataItem)->with('dataDia',$dataDia);
    }
    public function onMenjarmodpost(Request $request)
    {

      //return $request;
      if($request->file('file1')&&$request->file('file2')){
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
      }elseif($request->file('file1')){
        $fileprincipal = $request->file('file1');

        //obtenir nom imatge principal i secundaria
        $nomprincipal = $fileprincipal->getClientOriginalName();

        //Guardat imatges en local
        \Storage::disk('local')->put($nomprincipal,  \File::get($fileprincipal));
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
        ]);
      }elseif($request->file('file2')){
        $filesecundari = $request->file('file2');

        //obtenir nom imatge principal i secundaria
        $nomsecundari = $filesecundari->getClientOriginalName();

        //Guardat imatges en local
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
            'imatge2' => $nomsecundari
        ]);
      }
      else{
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
            'tancament_nit' => $datos["horariNitA"]
        ]);
      }
      //TODO crear model i afegir a bbdd
      $dies = collect();
      //return $request;

      //return $items;

      $Restaurant = new Restaurant();
      //return $Restaurant;
      $Item = new Items();

      $Dies = new Dies();
      $Restaurant->updateRestaurant($nouRestaurant, $datos["id"]);
      $Item->updateItem($request->Items, $datos["id"]);
      $Dies->updateDies($request->Dies, $datos["id"]);
        //$items = new Item();
        //$dies = new Dies();
        //$dataRestaurant = $restaurant->seleccionarRestaurant($request->input('id_restaurant'));
      return redirect('/onmenjar/add');
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
        $Item = new Items();
        $Item->borrarItem($id);
        $dies = new Dies();
        $dies->borrarDia($id);
        $Visites = new visitesRestaurant();
        $Visites->borrarRestaurantVisita($id);
        return redirect()->back();
    }

}
