<div>
            <div class="form-group row">
                <label for="tipo" class="col-lg-6 col-form-label">Tipo <span class='requerido'>(Requerido)</span></label>
                
                    <select name="id_tipo" id="tipo">
                                    <option value="">** Tipo de propiedad **</option>
                                   
                                    @foreach($viewData['tipo'] as $tipo)
                                        <option value="{{$tipo->id_subtipo}}">{{$tipo->subtipo}} </option> 
                                    @endforeach
                    </select> 
                
            </div>

            <div class="form-group row">
                <label for="ofrecimiento" class="col-lg-8 col-form-label">Ofrecimiento <span class="requerido">(Requerido)</span></label>
                
                    <select name="id_ofrecimiento" id="ofrecimiento">
                                    <option value="">*** Desea comprar o alquilar ? ***</option>
                                    @foreach($viewData['ofrecimiento'] as $ofrecimiento)
                                        <option value="{{$ofrecimiento->id_ofrecimiento}}">{{$ofrecimiento->ofrecimiento}} </option>
                                    @endforeach
                    </select> 
                
            </div>
            
      <div class="form-group row">
         <label for="ciudad" class="col-lg-4 col-form-label">Ciudad</label>
         
               <select wire:model="selectedCiudad" id="ciudad" name="id_ciudad"> 
                     <option value="">**Ubicacion Ciudad**</option>
                     @foreach($viewData['ciudades'] as $ciudad)
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
