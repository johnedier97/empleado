<div class="row padding-1 p-1">
    <div class="alert alert-primary" role="alert">
        Los campos con asterisco (*) son obligatorios.
    </div>

    <div class="col-md-12">

        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="nombre" class="form-label">{{ __('Nombre Completo *') }}</label>
            </div>
            <div class="col-md-5">
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre', $empleado?->nombre) }}" id="nombre" maxlength="100" placeholder="Nombre completo del empleado" required>
                {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>


        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="email" class="form-label">{{ __('Correo Electrónico *') }}</label>
            </div>
            <div class="col-md-5">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $empleado?->email) }}" id="email" maxlength="255" placeholder="Email" required>
                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>


        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="sexo" class="form-label">{{ __('Sexo *') }}</label>
            </div>
            <div class="col-md-5">
                <div class="form-check">
                    <input type="radio" name="sexo" class="form-check-input @error('sexo') is-invalid @enderror"
                           value="M" id="sexo_m" {{ old('sexo', $empleado?->sexo) === 'M' ? 'checked' : '' }}>
                    <label for="sexo_m" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="sexo" class="form-check-input @error('sexo') is-invalid @enderror"
                           value="F" id="sexo_f" {{ old('sexo', $empleado?->sexo) === 'F' ? 'checked' : '' }}>
                    <label for="sexo_f" class="form-check-label">Femenino</label>
                </div>
                {!! $errors->first('sexo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="area_id" class="form-label">{{ __('Área') }}</label>
            </div>
            <div class="col-md-5">
                <select name="area_id" class="form-control @error('area_id') is-invalid @enderror" id="area_id">
                    <option value="">Seleccionar área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $empleado?->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('area_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="descripcion" class="form-label">{{ __('Descripción *') }}</label>
            </div>
            <div class="col-md-5">
                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                          id="descripcion" rows="3" minlength="10" maxlength="500" placeholder="Descripción del empleado" required>{{ old('descripcion', $empleado?->descripcion) }}</textarea>
                {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        
        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-check">
                    <input type="checkbox" name="boletin" class="form-check-input @error('boletin') is-invalid @enderror"
                           value="1" id="boletin" {{ old('boletin', $empleado?->boletin) ? 'checked' : '' }}>
                    <label for="boletin" class="form-check-label">{{ __('Deseo recibir boletin informativo') }}</label>
                    {!! $errors->first('boletin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>



        <div class="form-group mb-2 mb20 d-flex align-items-center">
            <div class="col-md-2">
                <label for="roles" class="form-label">{{ __('Roles *') }}</label>
            </div>
            <div class="col-md-5">
                @foreach($roles as $rol)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" class="form-check-input @error('roles') is-invalid @enderror"
                               value="{{ $rol->id }}" id="rol_{{ $rol->id }}" {{ in_array($rol->id, old('roles', $empleado?->roles->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                        <label for="rol_{{ $rol->id }}" class="form-check-label">{{ $rol->nombre }}</label>
                    </div>
                @endforeach
                {!! $errors->first('roles', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>


    <div class="col-md-12 mt20 mt-2 d-flex align-items-center">
        <div class="col-md-2">

        </div>
        <div class="col-md-5">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </div>
    </div>
</div>


