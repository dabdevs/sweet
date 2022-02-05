@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form id="userFilterForm">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="city" class="form-label">{{ __('City') }}</label>
                        <select name="city_id" id="city" class="form-control" onchange="$('#userFilterForm').submit()">
                            <option value="">Selecciona una opción</option>
                            @foreach ($data['cities'] as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label for="location" class="form-label">{{ __('Location') }}</label>
                        <select name="location_id" id="location" class="form-control" onchange="$('#userFilterForm').submit()">
                            <option value="">Selecciona una opción</option>
                            @foreach ($data['locations'] as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach ($users as $user)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </form>

        <div class="">
            {!! $users->links() !!}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#userFilterForm').on('submit', () => {
            let url = "{{ route('index') }}";
            let data = $(this).serializeArray();

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: data,
                beforeSend: function() {
                    Swal.fire('Buscando...')
                    Swal.showLoading()
                },
                success: function (response) {
                    if (response.success === 'OK')
                    {
                        $('.table-list').empty().html(response.table);
                    }
                    Swal.close();
                },
                error:function (response) {
                    console.log(response)
                    Swal.close();
                }
            });
        })
    </script>
@endsection

