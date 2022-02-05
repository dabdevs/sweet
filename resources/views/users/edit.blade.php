@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        @include('shared.alerts')

                        <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            {{ Form::open() }}

                            <div class="col-md-4">
                                <label for="country" class="form-label">{{ __('Country') }}</label>
                                <select readonly name="country_id" id="country" class="form-control select2" onchange="getCities()">
                                    @foreach ($data['countries'] as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $user->profile->country_id) selected @endif>{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">{{ __('City') }}</label>
                                <select name="city_id" id="city" class="form-control select2" onchange="getLocations()">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($data['cities'] as $city)
                                        <option value="{{ $city->id }}" @if ($city->id == $user->profile->city_id) selected @endif>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="location" class="form-label">{{ __('Location') }}</label>
                                <select name="location_id" id="location" class="form-control select2">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($data['locations'] as $location)
                                        <option value="{{ $location->id }}" @if ($location->id == $user->profile->location_id) selected @endif>
                                            {{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
                                <input name="telephone" type="number" class="form-control" id="telephone"
                                    value="{{ $user->profile->telephone ?? '' }}" min="1">
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input name="whatsapp" class="form-check-input" type="checkbox" id="whatsapp"
                                        @if ($user->profile != null) {{ $user->profile->whatsapp ? 'checked' : '' }} @endif>
                                    <label class="form-check-label" for="whatsapp">
                                        {{ __('I have whatsapp') }}
                                    </label>
                                </div>
                            </div>

                            
                            <div class="col-sm-12">
                                
                            </div>

                            <div class="col-md-4">
                                <label for="service" class="form-label">{{ __('Services') }}:</label> 
                                <p>
                                    @if($user->profile->services != null)
                                        @foreach ($user->profile->services as $service)
                                            <span class="badge bg-primary">{{ $service->name }}</span>
                                        @endforeach
                                    @endif
                                </p>
                                <select name="services[]" id="services" class="form-control" multiple>
                                    @foreach ($data['services'] as $service)
                                        <option value="{{ $service->id }}" @if($user->profile->services != null && in_array($service->id, $user->profile->services->toArray())) selected @endif>
                                            {{ $service->name }} {{ in_array($service->id, $user->profile->services->toArray()) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('home') }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i> Volver</a>
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                            </div>
                            {{ Form::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function getCities() {
            let countryId = $('#country').val();
            
            if (countryId == '') {
                $('#city').empty()
                return;
            }

            let $select = $('#city').empty()
            let $selectLocation = $('#location').empty()

            $.ajax({
                url: "{{ route('get-cities', ['country_id' => ':country_id']) }}".replace(':country_id',
                    countryId),
                success: function(response) {
                    if (response.length > 0) {
                        $select.append($('<option value="">Selecciona una opción</option>'))
                        for (var key in response) {
                            $select.append($('<option value="' + response[key].id + '">' + response[key].name +
                                '</option>'))
                        }

                        $select.prop('disabled', false)
                    } else {
                        $select.prop('disabled', true)
                        $selectLocation.prop('disabled', true)
                    }
                },
                error: function() {
                    alert.log("Ha habido un error.");
                }
            });
        }

        function getLocations() {
            let cityId = $('#city').val();
          
            if (cityId == '') {
                $('#location').empty()
                return;
            }

            let $select = $('#location').empty()

            $.ajax({
                url: "{{ route('get-locations', ['city_id' => ':city_id']) }}".replace(':city_id', cityId),
                success: function(response) {
                    $select = $('#location').empty()
                    if (response.length > 0) {
                        $select.append($('<option value="">Selecciona una opción</option>'))
                        for (var key in response) {
                            $select.append($('<option value="' + response[key].id + '">' + response[key].name +
                                '</option>'))
                        }
                        $select.prop('disabled', false)
                    } else {
                        $select.prop('disabled', true)
                    }
                },
                error: function() {
                    alert.log("Ha habido un error.");
                }
            });
        }
    </script>

@endsection
