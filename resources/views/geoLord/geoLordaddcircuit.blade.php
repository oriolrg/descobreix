@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <ul class="nav nav-tabs">
                <li id=""><a href="/onmenjar/">onMenjar</a></li>
                <li class="active" id=""><a href="/geolord/">GeoLord</a></li>
              </ul>
                <div class="panel-heading">
                  <a class="btn btn-primary" id="afegirRest">
                    <i class="glyphicon glyphicon-plus">  Afegir Circuit  </i>
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
                            <label for="nomestabliment" class="control-label col-md-3">Nom circuit</label>
                            <div class="col-md-9">
                                <input type="text" name="nom" id="nom" class="form-control" required pattern="[a-zA-Z0-9\s-\u00C7]{1,30}">
                            </div>
                            <label for="telefon" class="control-label col-md-3">Coordenades</label>
                            <div class="col-md-9">
                                <input type="text" name="latitud" id="latitud" class="form-control">
                                <input type="text" name="longitud" id="longitud" class="form-control">
                            </div>
                            <label for="poblacio" class="control-label col-md-3">Poblacio</label required>
                            <div class="col-md-9">
                                <input type="text" name="poblacio" id="poblacio" class="form-control" required pattern="[a-zA-Z0-9\s-\u00C7]{1,30}">
                            </div>
                            <legend>Imatges</legend>
                            <form id="uploadimage1" action="" method="post" enctype="multipart/form-data">
                                <div id="selectImage">
                                    <div class="main" class="col-md-8 col-md-offset-2">
                                        <div class="col-md-12">
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
                <div class="panel-heading">Llistat circuits</div>
                    <div class="panel-body">
                      <div class="panel-heading">
                      <!-- Taula accessos -->
                      <table id="tableRestaurants" class="table table-striped">
                          <thead>
                          <tr>
                              <th>Nom<span></span></th>
                              <th>Nº de punts<span></span></th>
                              <th>Població<span></span></th>
                              <th>Visible<span></span></th>
                              <th>Imatge principal</th>
                          </tr>
                          </thead>
                          <tbody>

                              <tr class="
                                  " id="">
                                  <td class="soci">
                                  </td>
                                  <td class="nom">
                                  </td>
                                  <td class="poblacio">
                                  </td>
                                  <td class="actiu">
                                        <span style="color:green">Actiu</span>
                                        <span style="color:red">Inactiu</span>
                                  </td>
                                  <td class="matricula">
                                    <img src="http://lavalldelord.com/appvallLord/storage/app/images/" width="80px" class="img_thumbnail">
                                  </td>
                                  <td>
                                          <lavel id ="desactivar">
                                            <button type="submit" class="w1-button btn btn-warning btn-xs" name="act/" value=""
                                                    data-content="Activa la visivilitat del restaurant a l'aplicació" title="Desactivar" data-toggle="popover" data-trigger="hover">
                                                <i class="glyphicon glyphicon-exclamation-sign"> Desactivar </i>
                                            </button>
                                            </lavel>
                                          <lavel id ="activar">
                                            <button type="submit" class="w1-button btn btn-success btn-xs" name="desac/" value=""
                                                    data-content="Desactiva la visivilitat del restaurant a l'aplicació" title="Activar" data-toggle="popover" data-trigger="hover">
                                                <i class="glyphicon glyphicon-exclamation-sign"> Activar </i>
                                            </button>
                                            </lavel>
                                        <lavel id ="eliminar">
                                          <button type="submit" class="btn btn-danger btn-xs" name="id_restaurant" value=""
                                                  data-content="Eliminar definitivament el restaurant" title="Eliminar" data-toggle="popover" data-trigger="hover">
                                              <i class="glyphicon glyphicon-remove"> Eliminar </i>
                                          </button>
                                        </lavel>

                                      <lavel id ="modificar">
                                        <!--<form action="/onmenjar/mod" method="POST">-->
                                        <form action="/appvallLord/public/onmenjar/mod" method="POST">
                                          {{ csrf_field() }}
                                          <button type="submit" class="btn btn-primary btn-xs" name="id_restaurant" value=""
                                                  data-content="Modificar el restaurant" title="Modificar" data-toggle="popover" data-trigger="hover">
                                              <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                          </button>
                                        </form>
                                      </lavel>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      <!-- paginació accessos -->
                  </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
