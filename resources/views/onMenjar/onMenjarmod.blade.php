@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Modifica les dades del restaurant
              </div>

              <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                  @foreach($dataRestaurant as $key => $restaurant)
                  <form action="mod/post"  method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group" id="form">

                          <legend>Dades generals</legend>
                          <label for="nomestabliment" class="control-label col-md-3">Nom establiment</label>
                          <div class="col-md-9">
                              <input type="text" name="id" id="id" class="form-control" value ="{{$restaurant->id}}">
                              <input type="text" name="nomestabliment" id="nomestabliment" class="form-control" value ="{{$restaurant->nom}}">
                          </div>
                          <label for="telefon" class="control-label col-md-3">Telefon establiment</label>
                          <div class="col-md-9">
                              <input type="text" name="telefon" id="telefon" class="form-control" value ="{{$restaurant->telefon}}">
                          </div>
                          <label for="direccio" class="control-label col-md-3">Direcció</label>
                          <div class="col-md-9">
                              <input type="text" name="direccio" id="direccio" class="form-control" value ="{{$restaurant->direccio}}">
                          </div>
                          <label for="poblacio" class="control-label col-md-3">Poblacio</label>
                          <div class="col-md-9">
                              <input type="text" name="poblacio" id="poblacio" class="form-control" value ="{{$restaurant->poblacio}}">
                          </div>
                          <label for="preumig" class="control-label col-md-3">Preu mitja</label>
                          <div class="col-md-9">
                            @if ($restaurant->preu == "10 - 15")
                            <select name="preumig" id="preumig">
                                <option selected="selected" value="10 - 15">10€ - 15 €</option>
                                <option value="15 - 25">15€ - 25 €</option>
                                <option value="+25">+25 €</option>
                            </select>
                            @elseif ($restaurant->preu == "15 - 25")
                            <select name="preumig" id="preumig">
                                <option value="10 - 15">10€ - 15 €</option>
                                <option selected="selected" value="15 - 25">15€ - 25 €</option>
                                <option value="+25">+25 €</option>
                            </select>
                            @else
                            <select name="preumig" id="preumig">
                                <option value="10 - 15">10€ - 15 €</option>
                                <option value="15 - 25">15€ - 25 €</option>
                                <option selected="selected" value="+25">+25 €</option>
                            </select>
                            @endif
                          </div>
                          <legend>Dies obertura</legend>
                          <label for="diesObertura" class="control-label col-md-3"></label>
                          <div class="col-md-12">
                            @foreach($dataDia as $key => $dia)
                                @if ($dia->dilluns == 1)
                                    <input type="checkbox" name="Dies[1]" value="dilluns" checked/>Dilluns<br />
                                @else
                                    <input type="checkbox" name="Dies[1]" value="dilluns"/>Dilluns<br />
                                @endif
                                @if ($dia->dimarts == 1)
                                    <input type="checkbox" name="Dies[2]" value="dimarts" checked/>Dimarts<br />
                                @else
                                    <input type="checkbox" name="Dies[2]" value="dimarts" />Dimarts<br />
                                @endif
                                @if ($dia->dimecres == 1)
                                    <input type="checkbox" name="Dies[3]" value="dimecres" checked/>Dimecres<br />
                                @else
                                    <input type="checkbox" name="Dies[3]" value="dimecres" />Dimecres<br />
                                @endif
                                @if ($dia->dijous == 1)
                                    <input type="checkbox" name="Dies[4]" value="dijous" checked/>Dijous<br />
                                @else
                                    <input type="checkbox" name="Dies[4]" value="dijous"/>Dijous<br />
                                @endif
                                @if ($dia->divendres == 1)
                                    <input type="checkbox" name="Dies[5]" value="divendres" checked/>Divendres<br />
                                @else
                                    <input type="checkbox" name="Dies[5]" value="divendres" />Divendres<br />
                                @endif
                                @if ($dia->dissabte == 1)
                                    <input type="checkbox" name="Dies[6]" value="dissabte" checked/>Dissabte<br />
                                @else
                                    <input type="checkbox" name="Dies[6]" value="dissabte" />Dissabte<br />
                                @endif
                                @if ($dia->diumenge == 1)
                                    <input type="checkbox" name="Dies[7]" value="diumenge" checked/>Diumenge<br />
                                @else
                                    <input type="checkbox" name="Dies[7]" value="diumenge" />Diumenge<br />
                                @endif
                            @endforeach
                          </div>
                          <legend>Horari obertura cuina</legend>
                          <label for="horariDia" class="control-label col-md-3">Dia</label>
                          <div class="col-md-8">
                              <strong>de </strong>
                              <select name="horariDiaDe" id="horariDiaDe">
                                @if ($restaurant->obertura_dia == 10) <option value="10" selected="selected">10h</option>@else <option value="10">10h</option>@endif
                                @if ($restaurant->obertura_dia == 11) <option value="11" selected="selected">11h</option>@else <option value="11">11h</option>@endif
                                @if ($restaurant->obertura_dia == 12) <option value="12" selected="selected">12h</option>@else <option value="12">12h</option>@endif
                                @if ($restaurant->obertura_dia == 13) <option value="13" selected="selected">13h</option>@else <option value="13">13h</option>@endif
                              </select>
                              <strong>a </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariDiaA" id="horariDiaA">
                                @if ($restaurant->tancament_dia == 13) <option value="13" selected="selected">13h</option>@else <option value="13">13h</option>@endif
                                @if ($restaurant->tancament_dia == 14) <option value="14" selected="selected">14h</option>@else <option value="14">14h</option>@endif
                                @if ($restaurant->tancament_dia == 15) <option value="15" selected="selected">15h</option>@else <option value="15">15h</option>@endif
                                @if ($restaurant->tancament_dia == 16) <option value="16" selected="selected">16h</option>@else <option value="16">16h</option>@endif
                                @if ($restaurant->tancament_dia == 17) <option value="17" selected="selected">17h</option>@else <option value="17">17h</option>@endif
                              </select>
                          </div>
                          <label for="horariNit" class="control-label col-md-3">Nit</label>
                          <div class="col-md-8">
                              <strong>de </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariNitDe" id="horariNitDe">
                                @if ($restaurant->obertura_nit == 17) <option value="17" selected="selected">17h</option>@else <option value="17">17h</option>@endif
                                @if ($restaurant->obertura_nit == 18) <option value="18" selected="selected">18h</option>@else <option value="18">18h</option>@endif
                                @if ($restaurant->obertura_nit == 19) <option value="19" selected="selected">19h</option>@else <option value="19">19h</option>@endif
                                @if ($restaurant->obertura_nit == 20) <option value="20" selected="selected">20h</option>@else <option value="20">20h</option>@endif
                              </select>
                              <strong>a </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariNitA" id="horariNitA">
                                @if ($restaurant->tancament_nit == 21) <option value="21" selected="selected">21h</option>@else <option value="21">21h</option>@endif
                                @if ($restaurant->tancament_nit == 22) <option value="22" selected="selected">22h</option>@else <option value="22">22h</option>@endif
                                @if ($restaurant->tancament_nit == 23) <option value="23" selected="selected">23h</option>@else <option value="23">23h</option>@endif
                                @if ($restaurant->tancament_nit == 00) <option value="00" selected="selected">00h</option>@else <option value="00">00h</option>@endif
                              </select>
                          </div>
                          <legend>Checklist</legend>
                          <label for="Items" class="control-label col-md-3">Items</label>
                          <div class="col-md-8">
                            @foreach($dataItem as $key => $item)
                                @if ($item->Menu == 'checkmark-circle')
                                    <input type="checkbox" name="Items[1]" value="Menu" checked/>Menu<br />
                                @else
                                    <input type="checkbox" name="Items[1]" value="Menu"/>Menu<br />
                                @endif
                                @if ($item->MenuInfantil == 'checkmark-circle')
                                    <input type="checkbox" name="Items[2]" value="MenuInfantil" checked/>Menu infantil<br />
                                @else
                                    <input type="checkbox" name="Items[2]" value="MenuInfantil" />Menu infantil<br />
                                @endif
                                @if ($item->Carta == 'checkmark-circle')
                                    <input type="checkbox" name="Items[3]" value="Carta" checked/>Carta<br />
                                @else
                                    <input type="checkbox" name="Items[3]" value="Carta" />Carta<br />
                                @endif
                                @if ($item->CuinaCatalana == 'checkmark-circle')
                                    <input type="checkbox" name="Items[4]" value="CuinaCatalana" checked/>Cuïna catalana<br />
                                @else
                                    <input type="checkbox" name="Items[4]" value="CuinaCatalana" />Cuïna catalana<br />
                                @endif
                                @if ($item->Pizza == 'checkmark-circle')
                                    <input type="checkbox" name="Items[5]" value="Pizza" checked/>Pizza<br />
                                @else
                                    <input type="checkbox" name="Items[5]" value="Pizza" />Pizza<br />
                                @endif
                                @if ($item->PlatsCombinats == 'checkmark-circle')
                                    <input type="checkbox" name="Items[6]" value="PlatsCombinats" checked/>Plats combinats<br />
                                @else
                                    <input type="checkbox" name="Items[6]" value="PlatsCombinats" />Plats combinats<br />
                                @endif
                                @if ($item->Entrepans == 'checkmark-circle')
                                    <input type="checkbox" name="Items[7]" value="Entrepans" checked/>Entrepans<br />
                                @else
                                    <input type="checkbox" name="Items[7]" value="Entrepans" />Entrepans<br />
                                @endif
                                @if ($item->ApteCeliacs == 'checkmark-circle')
                                    <input type="checkbox" name="Items[8]" value="ApteCeliacs" checked/>Apte pels celíacs<br />
                                @else
                                    <input type="checkbox" name="Items[8]" value="ApteCeliacs" />Apte pels celíacs<br />
                                @endif
                                @if ($item->Terrasa == 'checkmark-circle')
                                    <input type="checkbox" name="Items[9]" value="Terrasa" checked/>Terrasa<br />
                                @else
                                    <input type="checkbox" name="Items[9]" value="Terrasa" />Terrasa<br />
                                @endif
                                @if ($item->ZonaEsbarjo == 'checkmark-circle')
                                    <input type="checkbox" name="Items[10]" value="ZonaEsbarjo" checked/>Zona d’esbarjo<br />
                                @else
                                    <input type="checkbox" name="Items[10]" value="ZonaEsbarjo" />Zona d’esbarjo<br />
                                @endif
                            @endforeach
                          </div>
                          <legend>Imatges</legend>
                          <form id="uploadimage1" action="" method="post" enctype="multipart/form-data">
                              <div id="selectImage">
                                  <div class="main" class="col-md-8 col-md-offset-2">
                                      <div class="col-md-6">
                                          <label>Selecciona la imatge pàgina principal</label><br/>
                                              <div id="message1"></div>
                                              <div id="selectImage">
                                                <label>
                                                    <strong>Mides recomanades: </strong>
                                                    <ul>
                                                      <li>550px x 340px</li>
                                                      <li>Màxim 50 kb</li>
                                                    </ul>
                                                    </label>
                                                 <input type="file" name="file1" id="file1" value="{{ $restaurant->imatgePrincipal}}"/>
                                              </div>
                                          <hr id="line">
                                          @if ($restaurant->imatgePrincipal)
                                            <div id="image_preview1"><img id="previewing1" src="http://lavalldelord.com/appvallLord/storage/app/images/{{ $restaurant->imatgePrincipal}}" display="block" height='230px' width="250px"/></div>
                                          @else
                                            <div id="image_preview1"><img id="previewing1" src="{{ url('/') }}/imatges/noimage.png" /></div>
                                          @endif
                                      </div>

                                      <div class="col-md-6">
                                          <label>Selecciona la imatge pàgina secundària</label><br/>
                                              <div id="message2"></div>
                                              <div id="selectImage">
                                                    <label>
                                                    <strong>Mides recomanades: </strong>
                                                    <ul>
                                                      <li>550px x 340px</li>
                                                      <li>Màxim 50 kb</li>
                                                    </ul>
                                                    </label>
                                                  <input type="file" name="file2" id="file2" required />
                                              </div>
                                              <hr id="line">
                                              @if ($restaurant->imatgeSecundaria)
                                                <div id="image_preview2"><img id="previewing2"  src="http://lavalldelord.com/appvallLord/storage/app/images/{{ $restaurant->imatgeSecundaria}}" display="block" height='230px' width="250px" /></div>
                                              @else
                                                <div id="image_preview2"><img id="previewing2" src="{{ url('/') }}/imatges/noimage.png" /></div>
                                              @endif
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <legend>Envia el formulari</legend>
                              <button type="submit" class="btn btn-primary" >
                                  <i class="glyphicon glyphicon-send"> Enviar </i>
                              </button>
                      </div>
                  </form>
                  @endforeach
          </div>
      </div>
            <div class="panel panel-default">
              <div class="panel-heading">Estadistiques</div>

              <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif


              </div>
            </div>
        </div>
    </div>
</div>
@endsection
