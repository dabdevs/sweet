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
                        <div class="card-body">
                            @if ($user->profile != null && $user->profile->file_id != null)
                            <img @if ($user->profile && $user->profile->file_id == 1) src="{{ asset('img/avatars/'.$user->profile->file->name) }}" @else src="{{ asset('storage/avatars/'.$user->profile->file->name) }}" @endif class="img-thumbnail rounded-circle" alt="foto de perfil" width="100px">
                            @endif
                            <p class="card-text">
                                {{ $user->username }} {{ $user->profile->gender ? ','.__($user->profile->gender) : '' }}
                            </p>
                            <a href="{{ route('show-profile') }}" class="btn btn-success"> <i class="fa fa-pencil"></i> Editar mi perfil</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
