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
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Completa tu perfil</h5>
                          <p class="card-text">
                              {{ Auth::user()->name }} {{ Auth::user()->profile == null ? '' : ', '.__(Auth::user()->profile->gender) }}
                          </p>
                          <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-primary">Completar</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
