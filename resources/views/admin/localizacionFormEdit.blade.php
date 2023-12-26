@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
    <div class="card-header">
        Editar Localizacion
    </div>
    <div class="card-body">
      @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
      @endif
      <form method="POST" action="{{ route('admin.localizacionForm.update',['id'=> $data['localizaciones']->getId()]) }}" enctype="form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-6">
                <div class="form-floating">
                    <select name="id_ciudad" class="form-select">
                        @foreach ($data["ciudades"] as $ciudad)
                            <option <?= $ciudad['id_ciudad'] == $data['localizaciones']->getIdCiudad()?"selected":"" ?> value="{{$ciudad['id_ciudad']}}">{{$ciudad['ciudad']}}</option>
                        @endforeach
                    </select> 
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Ciudad:</label>
                </div>
        </div>
        <div class="col-6">
            <div class="form-floating">
                <input id="residencial" name="residencial" value="{{ $data['localizaciones']->getResidencial() }}" type="text" class="form-control">
                <label for="residencial">Residencial</label>
            </div>
        </div>
      </div>
       
      <div class="row row-cols-12 mt-2">
        <div class="form-floating">
            <textarea id="direccion" class="col-12" name="direccion" >{{ $data['localizaciones']->getDireccion() }} </textarea> 
            <label id="direccion">Direccion</label>
        </div>
        
      </div>

      <div class="row row-cols-12 mt-2">
        <div class="form-floating">
            <textarea class="col-12" rows="10" id="descripcion" name="descripcion" >{{ $data['localizaciones']->getDescripcion() }} </textarea>
            <label for="descripcion">Descripcion</label> 
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.localizacionForm.index')}}">Regresar</a></button>
      </div>

    </form>
  </div>
</div>
@endsection