@extends('layouts.front')

@section('content')
    <div class="loading">
        <div class="loading-container">
            <p>{{ __('Welcome to Djnius...') }}</p>
            <img class="loader" src="{{ asset('rubik/img/rubik.svg') }}" />
        </div>
    </div>

    @include('frontend/menu')

    <div class="wrapper">
        @include('frontend/intro')

        @include('frontend/about-us')

        @include('frontend/services')

        @include('frontend/team')

        @include('frontend/gallery')

        @include('frontend/clients')

        @include('frontend/contact')
    </div>
@endsection
