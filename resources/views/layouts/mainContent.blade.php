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
    <form method="get" action="{{route('menu.inicio',['gestion'=>1,'id_propiedad'=>0])}}">
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
                    <button type="submit" name="submit" class="btn btn-secondary">Buscar</button>
                </div>
            </div>
    </form>
    </div>
    </div>
    
</div>

@switch ($viewData['gestion']) 
 
  @case (0)    @livewire('thumbs-photos',['tipo'=>0,'ofrecimiento'=>0,'ciudad'=>0,'localizacion'=>0,
                 'titulo'=>'Propiedades Destacadas','id_propiedad'=>0])  <!-- muestra fotos destacadas en la pagina principal  -->
              @break

  @case (1)

        @livewire('thumbs-photos',['tipo'=>1,'ofrecimiento'=>$_GET['id_ofrecimiento'],'ciudad'=>$_GET['id_ciudad'],
                                'localizacion'=>$_GET['id_localizacion'],'titulo'=>'Resultado de busqueda',
                                  'id_propiedad'=>0])  <!-- muestra resultado del formulario en la pagina principal  -->
        @break
  @case (2)
    @livewire('thumbs-photos',['tipo'=>2,'ofrecimiento'=>0,'ciudad'=>0,
                                'localizacion'=>0,'titulo'=>'Detalle de la propiedad seleccionada','id_propiedad'=>$viewData['id_propiedad']])  <!-- muestra resultado del formulario en la pagina principal  -->
        @break

@endswitch

@endsection