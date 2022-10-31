<div>
<div class="form-group row">
    <label for="ciudad" class="col-lg-4 col-form-label">Ciudades</label>
    <div class="col-lg-4">
         <select wire:model="selectedCiudad" id="ciudad" name="id_ciudad"> 
               <option value="">*** Ciudad ***</option>
               @foreach($ciudades as $ciudad)
                  <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
               @endforeach
         </select>
    </div>
</div>

@if ($selectedCiudad)
<div class="form-group row">
   <label for="localizacion" class="col-lg-4 col-form-label">Localizacion</label>
   <div class="col-lg-4">
        <select name="id_localizacion" id="localizacion">
               <option value="">*** Localizacion ***</option>
                  @foreach($localizaciones as $localizacion)
                     <option value="{{$localizacion->id_localizacion}}">{{$localizacion->residencial}}</option>
                  @endforeach
        </select>
   </div>
</div>
@endif
</div>
