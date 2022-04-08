@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        @include('shared.alerts')

                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                            @csrf
                            {{ Form::open() }}
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <img @if ($user->profile->file_id == 1) src="{{ asset('img/avatars/'.$user->profile->file->name) }}" @else src="{{ asset('storage/avatars/'.$user->profile->file->name) }}" @endif class="img-thumbnail rounded-circle" alt="foto de perfil" width="100px"> <br><br>
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div> 

                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="gender">{{ __('Gender') }}<span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control select2">
                                        <option value="">{{ __('Select an option') }}</option>
                                        <option value="Female" @if($user->profile->gender == 'Female') selected @endif>{{ __('Female') }}</option>
                                        <option value="Male" @if($user->profile->gender == 'Male') selected @endif>{{ __('Male') }}</option>
                                        <option value="Trans" @if($user->profile->gender == 'Trans') selected @endif>{{ __('Trans') }}</option>
                                        <option value="Other" @if($user->profile->gender == 'Other') selected @endif>{{ __('Other') }}</option>
                                    </select>
                                </div>
    
                                <div class="col-md-3">
                                    <label for="birthdate">{{ __('Birthdate') }}<span class="text-danger">*</span></label>
                                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $user->profile->birthdate->format('d/m/Y') }}">
    
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="country">{{ __('Country') }} <span class="text-danger">*</span></label>
                                    <select disabled name="country_id" id="country" class="form-control select2" onchange="getCities()">
                                        @foreach ($data['countries'] as $country)
                                            <option value="{{ $country->id }}" @if ($country->id == $user->profile->country_id) selected @endif>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="city">{{ __('City') }} <span class="text-danger">*</span></label>
                                    <select name="city_id" id="city" class="form-control select2" onchange="getLocations()">
                                        <option value="">{{ __('Select an option') }}</option>
                                        @foreach ($data['cities'] as $city)
                                            <option value="{{ $city->id == null ? old('city_id') : $city->id }}" @if ($city->id == $user->profile->city_id) selected @endif>{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="location">{{ __('Location') }} <span class="text-danger">*</span></label>
                                    <select name="location_id" id="location" class="form-control select2">
                                        <option value="{{ $user->profile->location_id == null ? old('location_id') : $user->profile->location_id }}">{{ $user->profile->location ? $user->profile->location->name : '' }}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="service">{{ __('Services') }}:</label> 
                                    @if($user->profile->services != null)
                                    <p class="my-1">
                                        @foreach ($user->profile->services as $service)
                                            <span class="badge bg-primary">{{ $service->name }}</span>
                                        @endforeach
                                    </p>
                                    @endif
                                    
                                    <select name="services[]" id="services" class="form-control mb-2" multiple>
                                        @foreach ($data['services'] as $service)
                                            <option value="{{ $service->id }}" @if($user->profile->services != null && in_array($service->id, $user->profile->services->toArray())) selected @endif>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="col-md-12">
                                        <label for="telephone">{{ __('Telephone') }}</label>
                                        <input name="telephone" type="text" class="form-control" id="telephone"
                                            value="{{ $user->profile->telephone == null ? old('telephone') : $user->profile->telephone  }}" min="1">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input name="whatsapp" class="form-check-input" type="checkbox" id="whatsapp" {{ $user->profile->whatsapp ? 'checked' : '' }}>
                                            <label class="form-check-label" for="whatsapp">
                                                {{ __('I have whatsapp') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="for-group col-12 mb-2">
                                        <label for="instagram">{{ __('Instagram') }}</label>
                                        <input name="instagram" type="text" class="form-control" id="instagram"
                                            value="{{ $user->profile->instagram == null ? old('instagram') : $user->profile->instagram }}" placeholder="https://www.instagram.com/{{ __('username') }}">
                                    </div>
                                    <div class="for-group col-12 mb-2">
                                        <label for="facebook">{{ __('Facebook') }}</label>
                                        <input name="facebook" type="text" class="form-control" id="facebook"
                                            value="{{ $user->profile->facebook == null ? old('facebook') : $user->profile->facebook }}" placeholder="https://www.facebook.com/{{ __('username') }}">
                                    </div>
                                    <div class="for-group col-12 mb-2">
                                        <label for="featured_video">{{ __('Featured Video') }}</label>
                                        <input name="featured_video" type="text" class="form-control" id="featured_video"
                                            value="{{ $user->profile->featured_video == null ? old('featured_video') : $user->profile->featured_video }}" placeholder="{{ __('Insert a valid youtube url') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12">
                                    <a href="{{ route('home') }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i> Volver</a>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> {{ __('Save changes') }}</button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.select2').select2();
    </script>

    @include('shared.combo-location')
@endsection



