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
                          <label for="soci" class="control-label col-md-3">Marca si és Soci</label>
                          <div class="col-md-9">
                            <input type='hidden' value='0' name='soci'>
                            @if ($restaurant->soci == "1")
                              <input type="checkbox" name="soci" value="1" checked/><br />
                            @else
                              <input type="checkbox" name="soci" value="1"/><br />
                            @endif
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
                                @if ($restaurant->obertura_dia == 'NULL') <option value="">Tancat</option> @else  <option value="">Tancat</option>@endif
                                @if ($restaurant->obertura_dia == '08:00') <option value="08:00" selected="selected">08:00</option>@else <option value="08:00">08:00</option>@endif
                                @if ($restaurant->obertura_dia == '08:30') <option value="08:30" selected="selected">08:30</option>@else <option value="08:30">08:30</option>@endif
                                @if ($restaurant->obertura_dia == '09:00') <option value="09:00" selected="selected">09:00</option>@else <option value="09:00">09:00</option>@endif
                                @if ($restaurant->obertura_dia == '09:30') <option value="09:30" selected="selected">09:30</option>@else <option value="09:30">09:30</option>@endif
                                @if ($restaurant->obertura_dia == '10:00') <option value="10:00" selected="selected">10:00</option>@else <option value="10:00">10:00</option>@endif
                                @if ($restaurant->obertura_dia == '10:30') <option value="10:30" selected="selected">10:30</option>@else <option value="10:30">10:30</option>@endif
                                @if ($restaurant->obertura_dia == '11:00') <option value="11:00" selected="selected">11:00</option>@else <option value="11:00">11:00</option>@endif
                                @if ($restaurant->obertura_dia == '11:30') <option value="11:30" selected="selected">11:30</option>@else <option value="11:30">11:30</option>@endif
                                @if ($restaurant->obertura_dia == '12:00') <option value="12:00" selected="selected">12:00</option>@else <option value="12:00">12:00</option>@endif
                                @if ($restaurant->obertura_dia == '12:30') <option value="12:30" selected="selected">12:30</option>@else <option value="12:30">12:30</option>@endif
                                @if ($restaurant->obertura_dia == '13:00') <option value="13:00" selected="selected">13:00</option>@else <option value="13:00">13:00</option>@endif
                                @if ($restaurant->obertura_dia == '13:30') <option value="13:30" selected="selected">13:30</option>@else <option value="13:30">13:30</option>@endif
                              </select>
                              <strong>a </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariDiaA" id="horariDiaA">
                                @if ($restaurant->obertura_dia == 'NULL') <option value="">Tancat</option> @else  <option value="">Tancat</option>@endif
                                @if ($restaurant->tancament_dia == '14:00') <option value="14:00" selected="selected">14:00</option>@else <option value="14:00">14:00</option>@endif
                                @if ($restaurant->tancament_dia == '14:30') <option value="14:30" selected="selected">14:30</option>@else <option value="14:30">14:30</option>@endif
                                @if ($restaurant->tancament_dia == '15:00') <option value="15:00" selected="selected">15:00</option>@else <option value="15:00">15:00</option>@endif
                                @if ($restaurant->tancament_dia == '15:30') <option value="15:30" selected="selected">15:30</option>@else <option value="15:30">15:30</option>@endif
                                @if ($restaurant->tancament_dia == '16:00') <option value="16:00" selected="selected">16:00</option>@else <option value="16:00">16:00</option>@endif
                                @if ($restaurant->tancament_dia == '16:30') <option value="16:30" selected="selected">16:30</option>@else <option value="16:30">16:30</option>@endif
                                @if ($restaurant->tancament_dia == '17:00') <option value="17:00" selected="selected">17:00</option>@else <option value="17:00">17:00</option>@endif
                              </select>
                          </div>
                          <label for="horariNit" class="control-label col-md-3">Nit</label>
                          <div class="col-md-8">
                              <strong>de </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariNitDe" id="horariNitDe">
                                @if ($restaurant->obertura_dia == 'NULL') <option value="">Tancat</option> @else  <option value="">Tancat</option>@endif
                                @if ($restaurant->obertura_nit == '17:00') <option value="17:00" selected="selected">17:00</option>@else <option value="17:00">17:00</option>@endif
                                @if ($restaurant->obertura_nit == '17:30') <option value="17:30" selected="selected">17:30</option>@else <option value="17:30">17:30</option>@endif
                                @if ($restaurant->obertura_nit == '18:00') <option value="18:00" selected="selected">18:00</option>@else <option value="18:00">18:00</option>@endif
                                @if ($restaurant->obertura_nit == '18:30') <option value="18:30" selected="selected">18:30</option>@else <option value="18:30">18:30</option>@endif
                                @if ($restaurant->obertura_nit == '19:00') <option value="19:00" selected="selected">19:00</option>@else <option value="19:00">19:00</option>@endif
                                @if ($restaurant->obertura_nit == '19:30') <option value="19:30" selected="selected">19:30</option>@else <option value="19:30">19:30</option>@endif
                                @if ($restaurant->obertura_nit == '20:00') <option value="20:00" selected="selected">20:00</option>@else <option value="20:00">20:00</option>@endif
                                @if ($restaurant->obertura_nit == '20:30') <option value="20:30" selected="selected">20:30</option>@else <option value="20:30">20:30</option>@endif
                                @if ($restaurant->obertura_nit == '21:00') <option value="21:00" selected="selected">21:00</option>@else <option value="21:00">21:00</option>@endif
                              </select>
                              <strong>a </strong>
                              <!--TODO arreglar formulari-->
                              <select name="horariNitA" id="horariNitA">
                                @if ($restaurant->obertura_dia == 'NULL') <option value="">Tancat</option> @else  <option value="">Tancat</option>@endif
                                @if ($restaurant->tancament_nit == '21:00') <option value="21:00" selected="selected">21:00</option>@else <option value="21:00">21:00</option>@endif
                                @if ($restaurant->tancament_nit == '21:30') <option value="21:30" selected="selected">21:30</option>@else <option value="21:30">21:30</option>@endif
                                @if ($restaurant->tancament_nit == '22:00') <option value="22:00" selected="selected">22:00</option>@else <option value="22:00">22:00</option>@endif
                                @if ($restaurant->tancament_nit == '22:30') <option value="22:30" selected="selected">22:30</option>@else <option value="22:30">22:30</option>@endif
                                @if ($restaurant->tancament_nit == '23:00') <option value="23:00" selected="selected">23:00</option>@else <option value="23:00">23:00</option>@endif
                                @if ($restaurant->tancament_nit == '23:30') <option value="23:30" selected="selected">23:30</option>@else <option value="23:30">23:30</option>@endif
                                @if ($restaurant->tancament_nit == '00:00') <option value="00:00" selected="selected">00:00</option>@else <option value="00:00">00:00</option>@endif
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
                                @if ($item->Brasa == 'checkmark-circle')
                                    <input type="checkbox" name="Items[8]" value="Brasa" checked/>Brasa<br />
                                @else
                                    <input type="checkbox" name="Items[8]" value="Brasa" />Brasa<br />
                                @endif
                                @if ($item->Terrasa == 'checkmark-circle')
                                    <input type="checkbox" name="Items[9]" value="Terrasa" checked/>Terrasa<br />
                                @else
                                    <input type="checkbox" name="Items[9]" value="Terrasa" />Terrasa<br />
                                @endif
                                @if ($item->Tapes == 'checkmark-circle')
                                    <input type="checkbox" name="Items[10]" value="Tapes" checked/>Tapes<br />
                                @else
                                    <input type="checkbox" name="Items[10]" value="Tapes" />Tapes<br />
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
                                                  <input type="file" name="file2" id="file2"/>
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

        </div>
    </div>
</div>
@endsection
