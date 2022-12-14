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
<div class="row">
    <div class="col-lg-3">
                <div class="mb-3 row">
                <label class="col-12 col-form-label">Agente:</label>
                <div class="col-lg-12"> 
                <select name="id_agente" class="form-control">
                    @foreach ($data["agentes"] as $agente)
                    <option value="{{$agente['id_agente']}}">{{$agente['nombre'].' '.$agente['apellidos']}}</option>
                    @endforeach
                </select> 
                </div>
                </div>
    </div>

    <div class="col-lg-3">
                <div class="mb-3 row">
                    <label class="col-12 col-form-label">Localizacion:</label>
                    <div class="col-lg-12"> 
                        <select name="id_localizacion" class="form-control">
                            @foreach ($data["localizaciones"] as $localizacion)
                                <option value="{{$localizacion['id_localizacion']}}">{{$localizacion['residencial']}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>

    </div>

    <div class="col-lg-3">
                <div class="mb-3 row">
                    <label class="col-12 col-form-label">Tipo Propiedad:</label>
                    <div class="col-lg-12"> 
                        <select name="id_subtipo" class="form-control">
                            @foreach ($data["subtipos"] as $subtipo)
                                <option value="{{$subtipo['id_subtipo']}}">{{$subtipo['subtipo']}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>

    </div>

    <div class="col-lg-3">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Propiedad No.:</label>
                <div class="col-lg-12"> 
                <input name="casaNumero" value="{{old('casaNumero')}}" type="text" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-12">
                <div class="mb-3 row">
                <label for="descripcion" class="col-lg-12 col-form-label">Descripcion:</label>
                <div class="col-lg-12"> 
                <textarea name="descripcion" class="form-control" id="descripcion" rows="5">{{old('descripcion')}}</textarea>
                </div>
                </div>
    </div>

</div>  <!-- Fin de row -->

<div class="row">

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Area construccion (mt2):</label>
                <div class="col-lg-8"> 
                <input name="area_construccion" value="{{old('area_construccion')}}" type="number" min="30" max="1000" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Area terreno (mt2):</label>
                <div class="col-lg-8"> 
                <input name="area_terreno" value="{{old('area_terreno')}}" type="number" min="30" max="10000" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">A??o Construccion:</label>
                <div class="col-lg-4"> 
                <input name="ano_construccion" value="{{old('ano_construccion')}}" type="number" min="1950" max="{{date('Y')}}" class="form-control"> 
                </div>
                </div>
                
    </div>
    
</div>  <!-- Fin de Row -->
<div class="row">
     

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Plantas:</label>
                <div class="col-lg-4"> 
                <input name="plantas" value="{{old('plantas')}}" type="number" min="1" max="5" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Garage:</label>
                <div class="col-lg-4"> 
                <input name="garage" value="{{old('garage')}}" type="number" min="0" max="20" class="form-control"> 
                </div>
                </div>

    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Aires Acondicionado:</label>
                <div class="col-lg-4"> 
                <input name="aires_acondicionado" value="{{old('aires_acondicionado')}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
                
    </div>


</div>  <!-- Fin de Row -->
<div class="row">

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Habitaciones:</label>
                <div class="col-lg-4"> 
                <input name="habitaciones" value="{{old('habitaciones')}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Ba??os:</label>
                <div class="col-lg-4"> 
                <input name="banos" value="{{old('banos')}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
    </div>

    <div class="col-4">
                <div class="mb-3 row">
                <label class="col-lg-12 col-form-label">Abanicos de Techo:</label>
                <div class="col-lg-4"> 
                <input name="abanicos_techo" value="{{old('abanicos_techo')}}" type="number" min="1" max="25" class="form-control"> 
                </div>
                </div>
                
    </div>

</div>  <!-- End row -->

<div class="row">

    <div class="col-lg-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="piscina" id="inlineCheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">Piscina?</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="cuartoDomestica" id="inlineCheckbox2">
            <label class="form-check-label" for="inlineCheckbox2">Cuarto Domestica?</label>
        </div>
    </div>

    <div class="col-lg-4">

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name= "bano_social" id="inlineCheckbox4">
            <label class="form-check-label" for="inlineCheckbox3">Ba??o Social?</label>
        </div>

        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="agua_caliente" id="inlineCheckbox5">
                <label class="form-check-label" for="inlineCheckbox1">Agua Caliente?</label>
        </div>
        
    </div>  <!--End col-4 -->

    <div class="col-lg-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="tanque_agua" id="inlineCheckbox6">
                <label class="form-check-label" for="inlineCheckbox2">Tanque de agua?</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="sistema_seguridad" id="inlineCheckbox7">
                <label class="form-check-label" for="inlineCheckbox1">Sistema de Seguridad?</label>
            </div>    
    </div> 
</div>   <!-- End row -->

<div class="row">

        <div class="col-lg-4">

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="destacado" id="inlineCheckbox9">
                <label class="form-check-label" for="inlineCheckbox2">Destacado</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox8">
                <label class="form-check-label" for="inlineCheckbox1">Disponibilidad</label>
            </div>

        </div>

</div>  <!--End row -->



<button type="submit" class="btn btn-primary mt-3">Guardar</button>
<button type="button" class="btn btn-primary mt-3"><a style="text-decoration:none;color:beige" href="{{ route('adminForms')}}">Regresar</a></button>
</div>

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