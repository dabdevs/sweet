@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $user->profile == null ? 'Aun no tenes un perfil' : 'Completa tu perfil' }}</h5>
                          <p class="card-text">
                              {{ $user->name }} {{ $user->profile == null ? '' : ', '.__($user->profile->gender) }}
                          </p>
                          <a href="{{ route('profile') }}" class="btn btn-success">{{ $user->profile == null ? 'Crear mi perfil' : 'Completar mi perfil' }}</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
