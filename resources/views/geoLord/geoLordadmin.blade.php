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
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ url('/geolord/addCircuit') }}"><i class="glyphicon glyphicon-pencil">  Administrar Circuits  </i></a>

                </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                Estadistiques
              </div>


              <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="active" id="restaurants"><a href="#">Circuit</a></li>
                    <li id="dies"><a href="#">Dies</a></li>
                    <li id="unicUser"><a href="#">Usuaris GeoLord</a></li>
                  </ul>
                </div>
                <table id="tableRestaurants" class="table table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Nom<span></span></th>
                        <th>Nº de punts<span></span></th>
                        <th>Població<span></span></th>
                        <th>Visible<span></span></th>
                        <th>Imatge principal</th>
                        <th>Numero Visites<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td class="soci">

                            </td>
                            <td class="nom">
                            </td>
                            <td class="poblacio">
                            </td>
                            <td class="actiu">
                            </td>
                            <td class="matricula">
                              <img src="http://lavalldelord.com/appvallLord/storage/app/images/" width="80px" class="img_thumbnail">
                            </td>
                            <td class="matricula">
                            </td>
                        </tr>
                    </tbody>

                </table>

                <table id="tableDies" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Consultes<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="dia">
                            </td>
                            <td class="consultes">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div id="tableUsuaris" class="panel-body">
                    <div class="col-lg-4 col-md-9">
                      <div class="panel panel-warning">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="glyphicon glyphicon-eye-open btn-lg"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div id="usuaris_onMenjar" class="huge"><span id="usuaris" class="contadors"></span></div>
                                      <div>Usuaris unics de l'aplicació onMenjar</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-9">
                      <div class="panel panel-warning">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="glyphicon glyphicon-eye-open btn-lg"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div id="usuaris_onMenjar" class="huge"></div>
                                      <div>Els usuaris usen de mitjana </div>
                                      <span id="usuaris" class="contadors"></span>
                                      <div>vegades l'aplicació</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="row top-row">
                        <div class="col-lg-4 col-md-9">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="glyphicon glyphicon-eye-open btn-lg"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div id="usuaris_onMenjar" class="huge"><span id="usuaris" class="contadors"></span></div>
                                            <div>Execucions AppValldeLord onMenjar</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <lavel id ="resset">
                      <button type="submit" class="btn btn-danger btn-xs" name="id_restaurant" value=""
                              data-content="Reiniciar valors estadistics" title="Resset" data-toggle="popover" data-trigger="hover">
                          <i class="glyphicon glyphicon-remove"> {{ csrf_field() }} Reiniciar estadístiques </i>
                      </button>
                  </lavel>
              </div>

        </div>
    </div>
</div>
@endsection
