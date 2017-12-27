@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administra seccions</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-info" href="{{ url('/onmenjar/') }}"><i class="glyphicon glyphicon-cutlery">  OnMenjar  </i></a>

                </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Estadistiques</div>

              <div class="panel-body">
                <div class="panel-body">
                    <div class="col-lg-4 col-md-9">

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
                                            <div id="accesos_mes" class="huge"><span id="Accessos" class="contadors">0</span></div>
                                            <div>Usuaris han executat OnMenjar</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


              </div>
            </div>
        </div>
    </div>
</div>
@endsection
