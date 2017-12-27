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
                  </ul>
                </div>
                <table id="tableRestaurants" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Població</th>
                        <th>Visible</th>
                        <th>Imatge principal</th>
                        <th>Numero Visites</th>
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
                            <td class="matricula">
                            {{$restaurant->countVisitaRestaurant}}  Visites
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                <table id="tableDies" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Consultes</th>
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
                        <th>Consultes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($horaris as $key => $horari)
                        <tr>
                            <td class="hora">
                                {{ $horari->hora}}
                            </td>
                            <td class="consultes">
                                {{ $horari->countHores}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Button
                <div class="form-group">
                   <label class="col-md-4 control-label" for="singlebutton"></label>
                   <div class="col-md-4 center-block">
                      <a id="ressetbutton" name="singlebutton" class="btn btn-danger center-block" href="{{ url('/onmenjar/estadistiquesRes') }}">
                          <i class="glyphicon glyphicon-trash"></i> Reiniciar Estadístiques
                       </a>
                   </div>
                </div>-->
              </div>

        </div>
    </div>
</div>
@endsection
