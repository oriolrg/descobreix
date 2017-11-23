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
                    <a class="btn btn-primary" href="{{ url('/onmenjar/add') }}"><i class="glyphicon glyphicon-plus">  Afegir establiment  </i></a>

                </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Estadistiques</div>

              <div class="panel-body">
                <table id="tableAccessos" class="table table-striped">
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
                <!-- paginació accessos -->
                {!! $restaurants->links() !!}

              </div>
            </div>
        </div>
    </div>
</div>
@endsection
