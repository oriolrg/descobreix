@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="btn btn-primary" id="afegirRest">
                    <i class="glyphicon glyphicon-plus">  Afegir Restaurant  </i>
                  </a>
                  <a class="btn btn-primary" id="ocultafegirRest">
                    <i class="glyphicon glyphicon-minus">  Amaga  </i>
                  </a>
                </div>

                <div class="panel-body" id="formRestaurant">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="post"  method="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group" id="form">

                            <legend>Dades generals</legend>
                            <label for="nomestabliment" class="control-label col-md-3">Nom establiment</label>
                            <div class="col-md-9">
                                <input type="text" name="nomestabliment" id="nomestabliment" class="form-control" required pattern="[a-zA-Z0-9\s-\u00C7]{1,30}">
                            </div>
                            <label for="telefon" class="control-label col-md-3">Telefon establiment</label>
                            <div class="col-md-9">
                                <input type="text" name="telefon" id="telefon" class="form-control" required pattern="[0-9]{9}">
                            </div>
                            <label for="direccio" class="control-label col-md-3">Direcció</label>
                            <div class="col-md-9">
                                <input type="text" name="direccio" id="direccio" class="form-control" required pattern="[a-zA-Z0-9\s\/-\u00C7]{1,30}">
                            </div>
                            <label for="poblacio" class="control-label col-md-3">Poblacio</label required>
                            <div class="col-md-9">
                                <input type="text" name="poblacio" id="poblacio" class="form-control" required pattern="[a-zA-Z0-9\s-\u00C7]{1,30}">
                            </div>
                            <label for="preumig" class="control-label col-md-3">Preu mitja</label>
                            <div class="col-md-9">
                              <select name="preumig" id="preumig">
                                  <option value="10 - 15">10€ - 15 €</option>
                                  <option value="15 - 25">15€ - 25 €</option>
                                  <option value="+25">+25 €</option>
                              </select>
                            </div>
                            <legend>Dies obertura</legend>
                            <label for="diesObertura" class="control-label col-md-3"></label>
                            <div class="col-md-12">
                                    <input type="checkbox" name="Dies[1]" value="dilluns" />Dilluns<br />
                                    <input type="checkbox" name="Dies[2]" value="dimarts" />Dimarts<br />
                                    <input type="checkbox" name="Dies[3]" value="dimecres" />Dimecres<br />
                                    <input type="checkbox" name="Dies[4]" value="dijous" />Dijous<br />
                                    <input type="checkbox" name="Dies[5]" value="divendres" />Divendres<br />
                                    <input type="checkbox" name="Dies[6]" value="dissabte" />Dissabte<br />
                                    <input type="checkbox" name="Dies[7]" value="diumenge" />Diumenge<br />
                            </div>


                            <legend>Horari obertura cuina</legend>
                            <label for="horariDia" class="control-label col-md-3">Dia</label>
                            <div class="col-md-8">
                                <strong>de </strong>
                                <!--TODO arreglar formulari-->
                                <select name="horariDiaDe" id="horariDiaDe">
                                    <option value="10">10h</option>
                                    <option value="11">11h</option>
                                    <option value="12">12h</option>
                                    <option value="13">13h</option>
                                </select>
                                <strong>a </strong>
                                <!--TODO arreglar formulari-->
                                <select name="horariDiaA" id="horariDiaA">
                                    <option value="13">13h</option>
                                    <option value="14">14h</option>
                                    <option value="15">15h</option>
                                    <option value="16">16h</option>
                                    <option value="17">17h</option>
                                </select>
                            </div>
                            <label for="horariNit" class="control-label col-md-3">Nit</label>
                            <div class="col-md-8">
                                <strong>de </strong>
                                <!--TODO arreglar formulari-->
                                <select name="horariNitDe" id="horariNitDe">
                                    <option value="17">17h</option>
                                    <option value="18">18h</option>
                                    <option value="19">19h</option>
                                    <option value="20">20h</option>
                                </select>
                                <strong>a </strong>
                                <!--TODO arreglar formulari-->
                                <select name="horariNitA" id="horariNitA">
                                    <option value="21">21h</option>
                                    <option value="22">22h</option>
                                    <option value="23">23h</option>
                                    <option value="00">00h</option>
                                </select>
                            </div>
                            <legend>Checklist</legend>
                            <label for="Items" class="control-label col-md-3">Items</label>
                            <div class="col-md-8">
                                    <input type="checkbox" name="Items[1]" value="Menu" />Menu<br />
                                    <input type="checkbox" name="Items[2]" value="MenuInfantil" />Menu infantil<br />
                                    <input type="checkbox" name="Items[3]" value="Carta" />Carta<br />
                                    <input type="checkbox" name="Items[4]" value="CuinaCatalana" />Cuïna catalana<br />
                                    <input type="checkbox" name="Items[5]" value="Pizza" />Pizza<br />
                                    <input type="checkbox" name="Items[6]" value="PlatsCombinats" />Plats combinats<br />
                                    <input type="checkbox" name="Items[7]" value="Entrepans" />Entrepans<br />
                                    <input type="checkbox" name="Items[8]" value="ApteCeliacs" />Apte pels celíacs<br />
                                    <input type="checkbox" name="Items[9]" value="Terrasa" />Terrasa<br />
                                    <input type="checkbox" name="Items[10]" value="ZonaEsbarjo" />Zona d’esbarjo<br />
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
                                                   <input type="file" name="file1" id="file1" required />
                                                </div>
                                						<hr id="line">
                                						<div id="image_preview1"><img id="previewing1" src="{{ url('/') }}/imatges/noimage.png" /></div>
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
                                    						<div id="image_preview2"><img id="previewing2" src="{{ url('/') }}/imatges/noimage.png" /></div>
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
            </div>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">Llistat restaurants</div>
                    <div class="panel-body">
                      <div class="panel-heading">
                      <!-- Taula accessos -->
                      <table id="tableAccessos" class="table table-striped">
                          <thead>
                          <tr>
                              <th>Restaurant</th>
                              <th>Població</th>
                              <th>Visible</th>
                              <th>Imatge principal</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($restaurants as $key => $restaurant)
                              <tr class="
                                  @if ($restaurant->actiu === 1)
                                          success
                                  @else
                                          danger
                                  @endif
                                  " id="{{ $restaurant->id }}">
                                  <td class="nom">
                                      {{ $restaurant->nom}}
                                  </td>
                                  <td class="poblacio">
                                      {{ $restaurant->poblacio}}
                                  </td>
                                  <td class="actiu">
                                    @if ($restaurant->actiu === 1)
                                        <span style="color:green">Actiu</span>
                                    @else
                                        <span style="color:red">Inactiu</span>
                                    @endif
                                  </td>
                                  <td class="matricula">
                                    <img src="http://lavalldelord.com/appvallLord/storage/app/images/{{ $restaurant->imatgePrincipal}}" width="80px" class="img_thumbnail">
                                  </td>
                                  <td>

                                        @if ($restaurant->actiu === 1)
                                          <lavel id ="desactivar">
                                            <button type="submit" class="w1-button btn btn-warning btn-xs" name="act/" value="{{ $restaurant->id}}"
                                                    data-content="Activa la visivilitat del restaurant a l'aplicació" title="Desactivar" data-toggle="popover" data-trigger="hover">
                                                <i class="glyphicon glyphicon-exclamation-sign"> Desactivar </i>
                                            </button>
                                            </lavel>
                                        @else
                                          <lavel id ="activar">
                                            <button type="submit" class="w1-button btn btn-success btn-xs" name="desac/" value="{{ $restaurant->id}}"
                                                    data-content="Desactiva la visivilitat del restaurant a l'aplicació" title="Activar" data-toggle="popover" data-trigger="hover">
                                                <i class="glyphicon glyphicon-exclamation-sign"> Activar </i>
                                            </button>
                                            </lavel>
                                        @endif

                                    </td>
                                    <td>
                                        <lavel id ="eliminar">
                                          <button type="submit" class="btn btn-danger btn-xs" name="id_restaurant" value="{{ $restaurant->id}}"
                                                  data-content="Eliminar definitivament el restaurant" title="Eliminar" data-toggle="popover" data-trigger="hover">
                                              <i class="glyphicon glyphicon-remove"> Eliminar </i>
                                          </button>
                                        </lavel>
                                    </td>
                                    <td>
                                      <lavel id ="modificar">
                                        <form action="/onmenjar/mod" method="POST">
                                        <!--<form action="/appvallLord/public/onmenjar/mod" method="POST">-->
                                          {{ csrf_field() }}
                                          <button type="submit" class="btn btn-primary btn-xs" name="id_restaurant" value="{{ $restaurant->id}}"
                                                  data-content="Modificar el restaurant" title="Modificar" data-toggle="popover" data-trigger="hover">
                                              <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                          </button>
                                        </form>
                                      </lavel>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      <!-- paginació accessos -->
                      {!! $restaurants->links() !!}
                  </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
