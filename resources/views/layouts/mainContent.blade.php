@extends('layouts/home')
@section('mainTitle',$viewData['titulo'])
@section('cuerpo')

<div class="col-lg-4 bg-primary">
<div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
  FORMULARIO DE BUSQUEDA
</div>
    <form method="post">

            <div class="form-group row">
                <label for="tipo" class="col-lg-4 col-form-label">Tipo</label>
                <div class="col-lg-4">
                    <select name="tipo" id="tipo">
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
                    <select name="ofrecimiento" id="ofrecimiento">
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
                    <button type="button" class="btn btn-secondary">Enviar</button>
                </div>
            </div>
    </form>
</div>

<div class="col-lg-4 bg-secondary">
<div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
     DESTACADOS
</div>
    <livewire:thumbs-photos/>
</div>

<div class="col-lg-4 bg-primary">
<div class="text-nowrap bg-light border" style="width: 13.5rem; text-align:center; margin:0 auto;margin-bottom:1.2rem">
  PATROCINIO
</div>
</div>
@endsection