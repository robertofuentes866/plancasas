@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
    <div class="card-header">
        Crear propiedad
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.casaForm.store') }}" enctype="multipart/form-data">
        @csrf
        <input name="id_tipo" value="1" type="hidden">
        <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 g-2">
            <div class="col">
                <div class="form-floating">
                    <select id="id_agente" name="id_agente" class=" form-select">
                        @foreach ($data["agentes"] as $agente)
                            <option value="{{$agente['id_agente']}}">{{$agente['nombre'].' '.$agente['apellidos']}}</option>
                        @endforeach
                    </select> 
                    <label for="id_agente">Agente</label> 
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                        <select id="id_localizacion" name="id_localizacion" class="form-select">
                            @foreach ($data["localizaciones"] as $localizacion)
                                <option value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
                            @endforeach
                        </select> 
                    <label for="id_localizacion">Localización</label> 
                </div>
            </div>

            <div class="col ">
                <div class="form-floating">
                    <select id="id_subtipo" name="id_subtipo" class="form-select">
                        @foreach ($data["subtipos"] as $subtipo)
                            <option value="{{$subtipo['id_subtipo']}}">{{$subtipo['subtipo']}}</option>
                        @endforeach
                    </select> 
                    <label for="id_subtipo">Tipo propiedad</label> 
                </div>
            </div>

            <div class="col ">
                <div class="form-floating">
                    <input id="casaNumero" name="casaNumero" value="{{old('casaNumero')}}" type="text" class="form-control">
                    <label for="casaNumero">Propiedad No.</label> 
                </div>
            </div>
        
        </div> 

        <div class="row row-cols-1">
            <div class="col">
                <div class="form-floating">
                    <textarea name="descripcion" class=" form-text col-12" id="descripcion" rows="5">{{old('descripcion')}}</textarea>
                    <label for="descripcion">Descripcion</label>
                </div>
            </div>
        </div>  <!-- Fin de row -->

        <div class="row row-cols-lg-6 row-cols-md-4 row-cols-sm-2 row-cols-1 g-2">

            <div class="col">
                <div class="form-floating">
                    <input id="area_construccion" name="area_construccion" value="{{old('area_construccion')}}" type="number" min="0" max="1000" class="form-control">     
                    <label for="area_construccion">Area construccion (mt2)</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input name="area_terreno" value="{{old('area_terreno')}}" type="number" min="0" max="10000" class="form-control">     
                    <label for="area_terreno">Area terreno (mt2)</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input name="ano_construccion" value="{{old('ano_construccion')}}" type="number" min="1930" max="{{date('Y')}}" class="form-control">     
                    <label for="ano_construccion">Año Construcción</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="plantas" name="plantas" value="{{old('plantas')}}" type="number" min="1" max="5" class="form-control">     
                    <label for="plantas">Plantas</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="garage" name="garage" value="{{old('garage')}}" type="number" min="0" max="20" class="form-control">     
                    <label for="garage">Garage</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="aires_acondicionado" name="aires_acondicionado" value="{{old('aires_acondicionado')}}" type="number" min="0" max="25" class="form-control">     
                    <label for="aires_acondicionado">Aires Acondicionado</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="habitaciones" name="habitaciones" value="{{old('habitaciones')}}" type="number" min="0" max="25" class="form-control">     
                    <label for="habitaciones">Habitaciones</label>
                </div>
            </div>
    
            <div class="col">
                <div class="form-floating">
                    <input id="banos" name="banos" value="{{old('banos')}}" type="number" min="0" max="25" class="form-control">     
                    <label for="banos">Baños</label>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input id="abanicos_techo" name="abanicos_techo" value="{{old('abanicos_techo')}}" type="number" min="0" max="25" class="form-control">     
                    <label for="abanicos_techo">Abanicos de techo</label>
                </div>
            </div>

        </div>  <!-- End row -->

    <div class="row row-cols-lg-8 row-cols-md-4 row-cols-2 g-3 mt-3 border">

        <div class="col d-flex flex-column">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
                <label class="form-check-label" for="inlineCheckbox1">Piscina?</label>
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
                <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica?</label>
            </div>
        </div>

        <div class="col d-flex flex-column">

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
                <label class="form-check-label" for="inlineCheckbox3">Baño Social?</label>
            </div>

            <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="agua_caliente" id="inlineCheckbox5">
                    <label class="form-check-label" for="inlineCheckbox1">Agua Caliente?</label>
            </div>
            
        </div>

        <div class="col d-flex flex-column">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="tanque_agua" id="inlineCheckbox6">
                    <label class="form-check-label" for="inlineCheckbox2">Tanque de agua?</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="sistema_seguridad" id="inlineCheckbox7">
                    <label class="form-check-label" for="inlineCheckbox1">Sistema de Seguridad?</label>
                </div>    
        </div> 
   
   

            <div class="col d-flex flex-column">

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox9">
                    <label class="form-check-label" for="inlineCheckbox2">Destacado</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox8">
                    <label class="form-check-label" for="inlineCheckbox1">Disponibilidad</label>
                </div>

            </div>

    </div>  <!--End row -->

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    <button type="button" class="btn btn-primary mt-3"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>


</form>
    </div>
    </div>




<div class="card">
<div class="card-header">
Ver propiedades
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">CIUDAD</th>
<th scope="col">RESIDENCIAL</th>
<th scope="col">PROP NUMERO</th>
<th scope="col">AGENTE INMOBILIARIO</th>
</tr>
</thead>
<tbody>
@foreach ($data["relacion"] as $relacion)
<tr>
<td>{{ $relacion->ciudad }}</td>
<td>{{ $relacion->residencial }}</td>
<td>{{ $relacion->casaNumero }}</td>
<td>{{ $relacion->nombreAgente }}</td>
<td> 
    <a class="btn btn-primary" href="{{route('admin.casaForm.edit',['id'=>$relacion->id_casa])}}">
    <i class="bi-pencil"></i>
    </a>
</td>
<td>
<form action="{{ route('admin.casaForm.delete',['id'=>$relacion->id_casa])}}" method="post" class="formulario_eliminar">
@csrf
@method('DELETE')
<button class="btn btn-danger">
<i class="bi-trash"></i>
</button>
</form>

</td> 
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection
@extends('admin.botonEliminar')