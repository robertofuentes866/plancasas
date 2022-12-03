<div>
      <div class="form-group row">
         <label for="ciudad" class="col-lg-4 col-form-label">Ciudades</label>
         
               <select wire:model="selectedCiudad" id="ciudad" name="id_ciudad"> 
                     <option value="">**Ubicacion Ciudad**</option>
                     @foreach($ciudades as $ciudad)
                        <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                     @endforeach
               </select>
         
      </div>

      @if ($selectedCiudad)
      <div class="form-group row">
         <label for="localizacion" class="col-lg-4 col-form-label">Localizacion</label>
        
            <select name="id_localizacion" id="localizacion">
                        <option value="">**Residencial**</option>
                        @foreach($localizaciones as $localizacion)
                           <option value="{{$localizacion->id_localizacion}}">{{$localizacion->residencial}}</option>
                        @endforeach
            </select>
          
      </div>
      @endif
</div>
