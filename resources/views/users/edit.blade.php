@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        
                        <form class="row g-3">
                            {{ Form::open(array('url' => 'foo/bar')) }}
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input readonly type="email" class="form-control" id="email" value="{{ $user->email }}">
                            </div>
                            <div class="col-12">
                                <label for="name" class="form-label">nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre de modelo" value="{{ $user->name }}">
                            </div>
                            <div class="col-12">
                                <label for="country" class="form-label">{{ __('Country') }}</label>
                                {!! Form::select('country_id', $countries->pluck('name', 'id'), false, ['id' => 'country', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">{{ __('City') }}</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                    Check me out
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                            {{ Form::close() }}
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection