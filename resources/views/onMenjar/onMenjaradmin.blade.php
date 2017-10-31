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
