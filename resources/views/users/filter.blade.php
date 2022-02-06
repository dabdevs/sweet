<div class="form-group w-100">
    <label for="city" class="form-label">{{ __('City') }}</label>
    <select name="city_id" id="city" class="form-control select2" onchange="submitForm()">
        <option value="">Selecciona una opción</option>
        @foreach ($data['cities'] as $city)
            <option value="{{ $city->id }}">{{ $city->name }}
            </option>
        @endforeach
    </select>
</div>
<br>
<div class="form-group w-100">
    <label for="location" class="form-label">{{ __('Location') }}</label>
    <select name="location_id" id="location" class="form-control select2" onchange="submitForm()">
        <option value="">Selecciona una opción</option>
        @foreach ($data['locations'] as $location)
            <option value="{{ $location->id }}">{{ $location->name }}
            </option>
        @endforeach
    </select>
</div>