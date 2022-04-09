<div class="row">
    @forelse ($users as $user)
        <div class="col-sm-6 col-md-3 col-lg-2">
            <div class="card m-x-1" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->user->username }}, {{ __($user->gender)[0] }}</h5>
                    <p class="card-text"><img src="{{ asset('img/icons/location-dot-solid.svg') }}" style="margin-bottom: 5px" width="10px" alt=""> {{ $user->city->name}}</p>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">{{ __('Visit') }}</a>
                </div>
            </div>
        </div>
    @empty 
    <div class="col-12 py-4">
        <h5><center>{{ __('No results found.') }}</center></h5>
    </div>
    @endforelse
    
    <br>
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
</div>