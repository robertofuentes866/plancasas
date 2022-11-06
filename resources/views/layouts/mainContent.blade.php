@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-4 bg-primary">  <!-- Primera columna, la del formulario -->

    <div class="card text-black bg-light mb-3 mt-2 mx-auto" style="max-width: 22rem;">
    <div class="card-header" style="text-align:center"><strong>Búsqueda de Propiedad </strong></div>
    <div class="card-body">
    <form method="post" action="{{route('busquedaPorFormulario')}}" >
            @csrf
            <div class="form-group row">
                <label for="tipo" class="col-lg-6 col-form-label">Tipo</label>
                
                    <select name="id_tipo" id="tipo">
                                    <option value="">** Tipo **</option>
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_tipo}}">{{$tipo->tipo}} </option>
                                    @endforeach
                    </select> 
                
            </div>

            <div class="form-group row">
                <label for="ofrecimiento" class="col-lg-6 col-form-label">Ofrecimiento</label>
                
                    <select name="id_ofrecimiento" id="ofrecimiento">
                                    <option value="">*** Ofrecimiento ***</option>
                                    @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                        <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                    @endforeach
                    </select> 
                
            </div>
            
                <livewire:select-component/>
            
               
            <div class="form-group row my-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                </div>
            </div>
    </form>
    </div>
    </div>
    
</div>
@livewire('thumbs-photos')  <!-- en este livewire estan las otras dos columnas. -->

@endsection