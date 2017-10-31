@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Afegir restaurant</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="post"  method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group" id="form">

                            <legend>Dades generals</legend>
                            <label for="nomestabliment" class="control-label col-md-3">Nom establiment</label>
                            <div class="col-md-8">
                                <input type="text" name="nomestabliment" id="nomestabliment" class="form-control">
                            </div>
                            <label for="telefon" class="control-label col-md-3">Telefon establiment</label>
                            <div class="col-md-8">
                                <input type="text" name="telefon" id="telefon" class="form-control">
                            </div>
                            <label for="preumig" class="control-label col-md-3">Preu mitja</label>
                            <div class="col-md-8">
                              <select name="preumig" id=preumig">
                                  <option value="deu_i_quinze">10€ - 15 €</option>
                                  <option value="quinze_vinticinc">15€ - 25 €</option>
                                  <option value="mes_vinticinc">+25 €</option>
                              </select>
                            </div>
                            <label for="titol" class="control-label col-md-12">Horari obertura</label>
                            <label for="horariMati" class="control-label col-md-3">Matí</label>
                            <div class="col-md-8">
                                <input type="time" name="horariMati" id="horariMati">
                            </div>
                            <label for="horariMigdia" class="control-label col-md-3">Migdia</label>
                            <div class="col-md-8">
                                <input type="time" name="horariMigdia" id="horariMigdia">
                            </div>
                            <label for="horariNit" class="control-label col-md-3">Nit</label>
                            <div class="col-md-8">
                                <input type="time" name="horariNit" id="horariNit">
                            </div>
                            <legend>Checklist</legend>
                            <label for="Items" class="control-label col-md-3">Items</label>
                            <div class="col-md-8">
                                    <input type="checkbox" name="Items[1]" value="Menu" />Menu<br />
                                    <input type="checkbox" name="Items[2]" value="Menu infantil" />Menu infantil<br />
                                    <input type="checkbox" name="Items[3]" value="Carta" />Carta<br />
                                    <input type="checkbox" name="Items[4]" value="Cuïna catalana" />Cuïna catalana<br />
                                    <input type="checkbox" name="Items[5]" value="Pizza" />Pizza<br />
                                    <input type="checkbox" name="Items[6]" value="Plats combinats" />Plats combinats<br />
                                    <input type="checkbox" name="Items[7]" value="Entrepans" />Entrepans<br />
                                    <input type="checkbox" name="Items[8]" value="Apte pels celíacs" />Apte pels celíacs<br />
                                    <input type="checkbox" name="Items[9]" value="Terrasa" />Terrasa<br />
                                    <input type="checkbox" name="Items[10]" value="Zona d’esbarjo" />Zona d’esbarjo<br />
                            </div>
                            <legend>Imatges</legend>
                            <form id="uploadimage1" action="" method="post" enctype="multipart/form-data">
                                <div id="selectImage">
                                    <div class="main" class="col-md-8 col-md-offset-2">
                                        <div class="col-md-6">
                                            <label>Selecciona la imatge pàgina principal</label><br/>
                                                <div id="image_preview1"><img id="previewing1" src="{{ url('/') }}/imatges/noimage.png" /></div>
                                                <hr id="line">
                                                <div id="message1"></div>
                                                <div id="selectImage">
                                                    <label>Selecciona la imatge</label><br/>
                                                    <input type="file" name="file1" id="file1" required />
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Selecciona la imatge pàgina secundària</label><br/>
                                                <div id="image_preview2"><img id="previewing2" src="{{ url('/') }}/imatges/noimage.png" /></div>
                                                <hr id="line">
                                                <div id="message2"></div>
                                                <div id="selectImage">
                                                    <label>Selecciona la imatge</label><br/>
                                                    <input type="file" name="file2" id="file2" required />
                                                </div>

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
