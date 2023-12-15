<div>
      
      <div class="form-group row">
        <div class="input-group">
            <label for="ciudad" class="input-group-text">Ciudad</label>
         
            <select wire:model="selectedCiudad" id="ciudad" name="id_ciudad" class="form-select"> 
                     <option value="">*Opciones*</option>
                     @foreach($viewData['ciudades'] as $ciudad)
                        <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                     @endforeach
            </select>
        </div>
         
         
      </div>

     @if($selectedCiudad)
        <div class="form-group row">
            <div class="input-group">
                <label for="localizacion" class="input-group-text">Localizacion</label>
            
                <select name="id_localizacion" id="localizacion" class="form-select">
                            <option value="">*Opciones*</option>
                            @foreach($localizaciones as $localizacion)
                            <option value="{{$localizacion->id_localizacion}}">{{$localizacion->residencial}}</option>
                            @endforeach
                </select>
            </div>
            
            
        </div>
    @endif
      
</div>  
