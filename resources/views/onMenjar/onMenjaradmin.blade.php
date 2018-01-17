@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administra onMenjar</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ url('/onmenjar/add') }}"><i class="glyphicon glyphicon-pencil">  Administrar establiments  </i></a>

                </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                Estadistiques
              </div>


              <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="active" id="restaurants"><a href="#">Restaurants</a></li>
                    <li id="dies"><a href="#">Dies</a></li>
                    <li id="hores"><a href="#">Horaris</a></li>
                    <li id="unicUser"><a href="#">Usuaris aplicació</a></li>
                  </ul>
                </div>
                <table id="tableRestaurants" class="table table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Socis<span></span></th>
                        <th>Restaurant<span></span></th>
                        <th>Població<span></span></th>
                        <th>Visible<span></span></th>
                        <th>Imatge principal</th>
                        <th>Numero Visites<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurants as $key => $restaurant)
                        <tr class="
                            @if ($restaurant->soci === 1)
                                    success
                            @else
                                    danger
                            @endif
                            " id="{{ $restaurant->id }}">
                            <td class="soci">
                              @if ($restaurant->soci === 1)
                                      Soci
                              @else
                                      No soci
                              @endif
                            </td>
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
                            <td class="matricula">
                            {{$restaurant->countVisitaRestaurant}} 
                            </td>
                        </tr>
                    @endforeach
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
                    @foreach($dies as $key => $dia)
                        <tr>
                            <td class="dia">
                              @switch($dia->dia)
                                @case(1)
                                    Dilluns
                                    @break

                                @case(2)
                                    Dimarts
                                    @break

                                @case(3)
                                    Dimecres
                                    @break
                                @case(4)
                                    Dijous
                                    @break
                                @case(5)
                                    Divendres
                                    @break
                                @case(6)
                                    Dissabte
                                    @break
                                @case(7)
                                    Diumenge
                                    @break
                            @endswitch
                            </td>
                            <td class="consultes">
                                {{ $dia->countDia}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table id="tableHoraris" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Consultes<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($horaris as $key => $horari)
                        <tr>
                            <td class="hora">
                                {{ $horari->hora}} hores
                            </td>
                            <td class="consultes">
                                {{ $horari->countHores}}
                            </td>
                        </tr>
                    @endforeach
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
                                      <div id="usuaris_onMenjar" class="huge"><span id="usuaris" class="contadors">{{ $count}}</span></div>
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
                                      <span id="usuaris" class="contadors">{{ $mitjana}}</span>
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
                                            <div id="usuaris_onMenjar" class="huge"><span id="usuaris" class="contadors">{{ $execucions[0]->count_accessos}}</span></div>
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
