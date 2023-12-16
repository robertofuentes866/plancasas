<div class="w-100 px-0">
    <div class="d-flex flex-lg-column">
        <div class="col">
            <div class="form-floating mb-2">
                
                <select wire:model="selectedCiudad" id="ciudad" name="id_ciudad" class="form-select"> 
                        <option value="">*Escoja una opción*</option>
                        @foreach($viewData['ciudades'] as $ciudad)
                            <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                        @endforeach
                </select>
                <label for="ciudad">Ciudad</label>
            </div>
        </div>
        

     @if($selectedCiudad)
        <div class="col">
            <div class="form-floating mb-2">
                <select name="id_localizacion" id="localizacion" class="form-select">
                            <option value="">*Escoja una opción*</option>
                            @foreach($localizaciones as $localizacion)
                            <option value="{{$localizacion->id_localizacion}}">{{$localizacion->residencial}}</option>
                            @endforeach
                </select>
                <label for="localizacion">Localizacion</label>
            </div>
        </div>
            
    @endif
    </div>
</div>  
