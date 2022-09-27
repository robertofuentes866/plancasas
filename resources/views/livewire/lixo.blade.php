
        <div>
            <select wire:model="selectedCiudad"> 
                        <option value="">*** Ciudad ***</option>
                        @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id_ciudad}}">{{$ciudad->ciudad}}</option>
                        @endforeach
            </select>
     @if($selectedCiudad)
            <select> 
                        <option value="">*** Localizacion ***</option>
                        @foreach($localizaciones as $localizacion)
                            <option value="{{$localizacion->id_localizacion}}">{{$localizacion->residencial}}</option>
                        @endforeach
            </select>
    @endif
        </div>
        