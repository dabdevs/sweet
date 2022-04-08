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
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <img @if ($user->profile->file_id == 1) src="{{ asset('img/avatars/'.$user->profile->file->name) }}" @else src="{{ asset('storage/avatars/'.$user->profile->file->name) }}" @endif class="img-thumbnail rounded-circle" alt="foto de perfil" width="100px"> <br><br>
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div> 

                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <br>
                                    <h4>{{ __('Personal information') }}</h4>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="firstname">{{ __('Firstname') }}</label>
                                    <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" 
                                        value="{{ $user->profile->firstname == null ? old('firstname') : $user->profile->firstname }}">
                                    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="lastname">{{ __('Lastname') }}</label>
                                    <input name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                                        value="{{ $user->profile->lastname == null ? old('lastname') : $user->profile->lastname }}">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="gender">{{ __('Gender') }}<span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control select2 @error('gender') is-invalid @enderror">
                                        <option value="">{{ __('Select an option') }}</option>
                                        <option value="Female" @if($user->profile->gender == 'Female') selected @endif {{ old('gender') === 'Female' ? 'selected' : '' }} >{{ __('Female') }}</option>
                                        <option value="Male" @if($user->profile->gender == 'Male') selected @endif {{ old('gender') === 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                        <option value="Trans" @if($user->profile->gender == 'Trans') selected @endif {{ old('gender') === 'Trans' ? 'selected' : '' }}>{{ __('Trans') }}</option>
                                        <option value="Other" @if($user->profile->gender == 'Other') selected @endif {{ old('gender') === 'Other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="col-md-3">
                                    <label for="birthdate">{{ __('Birthdate') }}<span class="text-danger">*</span></label>
                                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $user->profile->birthdate ?? '' }}">
    
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="country">{{ __('Country') }} <span class="text-danger">*</span></label>
                                    <select disabled name="country_id" id="country" class="form-control select2 @error('country_id') is-invalid @enderror" onchange="getCities()">
                                        @foreach ($data['countries'] as $country)
                                            <option value="{{ $country->id }}" @if ($country->id == $user->profile->country_id) selected @endif>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="city">{{ __('City') }} <span class="text-danger">*</span></label>
                                    <select name="city_id" id="city" class="form-control select2  @error('city_id') is-invalid @enderror" onchange="getLocations()">
                                        <option value="">{{ __('Select an option') }}</option>
                                        @foreach ($data['cities'] as $city)
                                            <option value="{{ $city->id }}" @if($user->profile->city_id == $city->id) selected @endif>{{ $city->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="location">{{ __('Location') }} <span class="text-danger">*</span></label>
                                    <select name="location_id" id="location" class="form-control select2 @error('location_id') is-invalid @enderror">
                                        <option value="{{ $user->profile->location_id ?? '' }}">{{ $user->profile->location ? $user->profile->location->name : '' }}</option>
                                    </select>
                                    @error('location_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <br>
                                    <h4>{{ __('Professional information') }}</h4>
                                </div>

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
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="for-group col-12 mb-2">
                                        <label for="featured_video">{{ __('Featured Video') }}</label>
                                        <input name="featured_video" type="text" class="form-control @error('featured_video') is-invalid @enderror" id="featured_video"
                                            value="{{ $user->profile->featured_video == null ? old('featured_video') : $user->profile->featured_video }}" placeholder="{{ __('Insert a valid youtube url') }}">
                                        @error('featured_video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <br>
                                    <h4>{{ __('Contact information') }}</h4>
                                </div>

                                <div class="col-md-12">
                                    <label for="telephone">{{ __('Telephone') }}</label>
                                    <input name="telephone" type="text" class="form-control" id="telephone"
                                        value="{{ $user->profile->telephone == null ? old('telephone') : $user->profile->telephone  }}" min="1">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-check">
                                        <input name="whatsapp" class="form-check-input" type="checkbox" id="whatsapp" {{ $user->profile->whatsapp ? 'checked' : '' }}>
                                        <label class="form-check-label" for="whatsapp">
                                            {{ __('I have whatsapp') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="for-group col-12 mb-2">
                                    <label for="instagram">{{ __('Instagram') }}</label>
                                    <input name="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                                        value="{{ $user->profile->instagram == null ? old('instagram') : $user->profile->instagram }}" placeholder="https://www.instagram.com/{{ __('username') }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="for-group col-12 mb-2">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input name="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                                        value="{{ $user->profile->facebook == null ? old('facebook') : $user->profile->facebook }}" placeholder="https://www.facebook.com/{{ __('username') }}">
                                    
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12">
                                    <hr>
                                    <a href="{{ route('home') }}" class="btn"><i class="fa fa-arrow-left d-none"></i> {{ __('Cancel') }}</a>
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



