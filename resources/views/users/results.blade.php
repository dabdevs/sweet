<div class="row">
    @forelse ($users as $user)
        <div class="col-sm-3 p-1">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}, {{ __($user->profile->gender)[0] }}</h5>
                    <p class="card-text"><i class="fa fa-location"></i> {{ $user->profile->city->name }}</p>
                    <p class="card-text">{{ $user->profile->bio }}</p>
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