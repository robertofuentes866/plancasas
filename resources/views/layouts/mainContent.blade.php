@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('nav_link_inicio',$viewData['nav_link_inicio'])
@section('nav_link_registrar',$viewData['nav_link_registrar'])
@section('nav_link_entrar',$viewData['nav_link_entrar'])
@section('cuerpo')

<div class="col-lg-4 bg-primary">
    <div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
        FORMULARIO DE BUSQUEDA
    </div>
    <form method="post" action="{{route('busquedaPorFormulario')}}" class="form-class">
            @csrf
            <div class="form-group row">
                <label for="tipo" class="col-lg-4 col-form-label">Tipo</label>
                <div class="col-lg-4">
                    <select name="id_tipo" id="tipo">
                                    <option value="">** Tipo **</option>
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_tipo}}">{{$tipo->tipo}} </option>
                                    @endforeach
                    </select> 
                </div>
            </div>

            <div class="form-group row">
                <label for="ofrecimiento" class="col-lg-4 col-form-label">Ofrecimiento</label>
                <div class="col-lg-4">
                    <select name="id_ofrecimiento" id="ofrecimiento">
                                    <option value="">*** Ofrecimiento ***</option>
                                    @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                        <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                    @endforeach
                    </select> 
                </div>
            </div>
               <livewire:select-component/>
            <div class="form-group row my-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-secondary">Enviar</button>
                </div>
            </div>
    </form>
</div>
@livewire('thumbs-photos')
@endsection