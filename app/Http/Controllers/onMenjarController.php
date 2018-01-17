<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Items;
use App\Dies;
use App\visitesRestaurant;
use App\consultesDia;
use App\consultesHora;
use App\consultesApp;
use App\usersApp;
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
     * @return llista restaurants, horaris, dies, execucions, mitjana i count
     */
    public function index()
    {
        //return $restaurants;
        $restaurant = new Restaurant();
        //Es pagina el resultat
        $restaurants = $restaurant->getVisitesRestaurant()->paginate(40);
        //$horari = new consultesHora();
        $horaris = consultesHora::get();
        $dies = consultesDia::get();
        $execucions = consultesApp::get();
        $userApp = new usersApp();
        $mitjana = $userApp->mitjanaUsers();
        $count = $userApp->countUsers();
        return view('onMenjar/onMenjaradmin')
          ->with('restaurants', $restaurants)
          ->with('horaris', $horaris)
          ->with('dies', $dies)
          ->with('execucions', $execucions)
          ->with('mitjana', round($mitjana, 2))
          ->with('count', $count);
    }
    /** Crida el model per llistar tots els accessos
         * @return llista de restaurants
         */
    public function llistarRestaurants()
    {
        $restaurant = new Restaurant();
        //Es pagina el resultat
        $restaurants = $restaurant->getRestaurant()->paginate(55);
        return $restaurants;
    }
    /**
     * @return retorna la vista d'afegir restaurants
     *
     */
    public function onMenjaradd()
    {
        $restaurants = $this->llistarRestaurants();
        return view('onMenjar/onMenjaradd')->with('restaurants', $restaurants);

    }
    /** Afegeix informacio sobre nous restaurants
     * @param Request $request
     * @return redirecciona a /onmenjar/add després d'actualitzar les dades
     */
    public function onMenjarpost(Request $request)
    {
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
            'soci' => $datos["soci"],
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
        if($Restaurant->insertRestaurant($nouRestaurant))
        {
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
     * @param Request $request
     * @return view onMenjar/onMenjarmod amb dades de restaurant, hores i items
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

    /**
     * @param Request $request
     * @return redirecciona a /onmenjar/add després d'actualitzar les dades
     */
    public function onMenjarmodpost(Request $request)
    {
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
            'soci' => $datos["soci"],
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
            'soci' => $datos["soci"],
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
            'soci' => $datos["soci"],
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
        $nouRestaurant = collect([
            'nom' => $datos["nomestabliment"],
            'telefon' => $datos["telefon"],
            'direccio' => $datos["direccio"],
            'poblacio' => $datos["poblacio"],
            'soci' => $datos["soci"],
            'preuMitja' => $datos["preumig"],
            'obertura_dia' => $datos["horariDiaDe"],
            'tancament_dia' => $datos["horariDiaA"],
            'obertura_nit' => $datos["horariNitDe"],
            'tancament_nit' => $datos["horariNitA"]
        ]);
      }

      $Restaurant = new Restaurant();
      $Item = new Items();

      $Dies = new Dies();
      $Restaurant->updateRestaurant($nouRestaurant, $datos["id"]);
      $Item->updateItem($request->Items, $datos["id"]);
      $Dies->updateDies($request->Dies, $datos["id"]);
      return redirect('/onmenjar/add');
    }

    /** Desactiva visivilitat restaurant
     * @param $id
     * @return retorna a pàgina anterior
     */
    public function desactivarRestaurant($id){

        $Restaurant = new Restaurant();
        $Restaurant->desactivarRestaurant($id);
        return redirect()->back();
    }
    /** Aesactiva visivilitat restaurant
     * @param $id
     * @return retorna a pàgina anterior
     */
    public function activarRestaurant($id){
        $Restaurant = new Restaurant();
        $Restaurant->activarRestaurant($id);
        return redirect()->back();
    }/** Borra restaurant
     * @param $id
     * @return retorna a pàgina anterior
     */
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
