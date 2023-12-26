@extends('admin.home')
@section('title', $data["title"])
@section('cuerpo')
<div class="card mb-4">
    <div class="card-header">
        Editar Precios Propiedad
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.preciosCasaForm.update',['id_casa'=>$data['preciosCasa'][0]->id_casa,'id_ofrecimiento'=>$data['preciosCasa'][0]->id_ofrecimiento,
                                        'id_duracion'=>$data['preciosCasa'][0]->id_duracion,'id_recurso'=>$data['preciosCasa'][0]->id_recurso]) }}" enctype="form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <p class="fs-5 m-0">
                        Propiedad No.:
                    </p>
                    <p class="fs-5">
                        <b>{{ $data['preciosCasa'][0]->casaNumero }}</b>
                    </p>
                    
                </div>

                <div class="col-6">
                    <p class="fs-5 m-0">
                        Ofrecimiento:
                    </p>
                    <p class="fs-5">
                        <b>{{$data['preciosCasa'][0]->ofrecimiento}}</b>
                    </p>
                    
                </div>
            </div>
            <div class="row row-cols-2 mt-3">
                <div class="col-6">
                    <p class="fs-5 m-0">
                        Duración:
                    </p>
                    <p class="fs-5">
                        <b>{{$data['preciosCasa'][0]->duracion}}</b>
                    </p>
                </div>
                    
                <div class="col-6">
                    <p class="fs-5 m-0">
                        Recursos:
                    </p>
                    <p class="fs-5">
                        <b>{{$data['preciosCasa'][0]->recurso}}</b>
                    </p>
                </div>
            </div>

<div class="row row-cols-2 border-top my-3">
    <div class="col-6 mt-2">
        <div class="form-floating">
            <input name="valor" value="{{$data['preciosCasa'][0]->valor}}" type="number" class="form-control">
            <label class="col-lg-6 col-md-6 col-sm-12 col-form-label">Precio:</label>
        </div> 
    </div>
    <div class="col-6 mt-2 py-4">
        <div class="form-check">
            <input {{$data['preciosCasa'][0]->disponibilidad?"checked":""}} class="form-check-input" type="checkbox" name="disponibilidad" id="inlineCheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">Precio disponible?</label>
        </div>
    </div>
</div>  <!-- Fin de Row -->

<button type="submit" class="btn btn-primary">Guardar</button>
<button type="button" class="btn btn-primary"><a style="text-decoration:none;color:beige" href="{{ route('admin.preciosCasaForm.index')}}">Regresar</a></button>
</div>

</form>
</div>
</div>
@endsection