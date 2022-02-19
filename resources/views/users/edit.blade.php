@extends('layouts.app')
@section('css')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        @include('shared.alerts')

                        <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ Form::open() }}
                            <div class="col-sm-12">
                                <img src="..." class="img-thumbnail" alt="..."> <br><br>
                                <input type="file" name="avatar" id="avatar">
                            </div>

                            <div class="col-md-2">
                                <label for="gender" class="form-label">{{ __('Gender') }} <span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="form-control select2">
                                    <option value="Female" @if($user->gender == 'Female') selected @endif>{{ __('Female') }}</option>
                                    <option value="Male" @if($user->gender == 'Male') selected @endif>{{ __('Male') }}</option>
                                    <option value="Transgender" @if($user->gender == 'Transgender') selected @endif>{{ __('Transgender') }}</option>
                                    <option value="Other" @if($user->gender == 'Other') selected @endif>{{ __('Other') }}</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="country" class="form-label">{{ __('Country') }} <span class="text-danger">*</span></label>
                                <select disabled name="country_id" id="country" class="form-control select2" onchange="getCities()">
                                    @foreach ($data['countries'] as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $user->profile->country_id) selected @endif>{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="city" class="form-label">{{ __('City') }} <span class="text-danger">*</span></label>
                                <select name="city_id" id="city" class="form-control select2" onchange="getLocations()">
                                    @foreach ($data['cities'] as $city)
                                        <option value="{{ $city->id }}" @if ($city->id == $user->profile->city_id) selected @endif>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="location" class="form-label">{{ __('Location') }} <span class="text-danger">*</span></label>
                                <select name="location_id" id="location" class="form-control select2">
                                    <option value="{{ $user->profile->location_id}}">{{ $user->profile->location ? $user->profile->location->name : '' }}</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
                                        <input name="telephone" type="text" class="form-control" id="telephone"
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
                                </div>
                                <div class="for-group col-12 mb-2">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                    <input name="instagram" type="text" class="form-control" id="instagram"
                                        value="{{ $user->profile->instagram ?? '' }}" placeholder="https://www.instagram.com/{{ __('username') }}">
                                </div>
                                <div class="for-group col-12">
                                    <label for="telegram" class="form-label">{{ __('Telegram') }}</label>
                                    <input name="telegram" type="text" class="form-control" id="telegram"
                                        value="{{ $user->profile->telegram ?? '' }}" placeholder="https://t.me/joinchat/ZXLBK9YhbNi0NaNh">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label for="service" class="form-label">{{ __('Services') }}:</label> 
                                @if($user->profile->services != null)
                                <p class="my-1">
                                    @foreach ($user->profile->services as $service)
                                        <span class="badge bg-primary">{{ $service->name }}</span>
                                    @endforeach
                                </p>
                                @endif
                                
                                <select name="services[]" id="services" class="form-control" multiple>
                                    @foreach ($data['services'] as $service)
                                        <option value="{{ $service->id }}" @if($user->profile->services != null && in_array($service->id, $user->profile->services->toArray())) selected @endif>
                                            {{ $service->name }} {{ in_array($service->id, $user->profile->services->toArray()) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <a href="{{ route('home') }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i> Volver</a>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> {{ __('Save changes') }}</button>
                            </div>
                            {{ Form::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('shared.combo-location')
@endsection

@section('js')
    <!-- include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })

        const input = document.querySelector('#avatar')
        const pond = FilePond.create(input)

        FilePond.setOption({
            server: '/upload'
        });
    </script>
@endsection

