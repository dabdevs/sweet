@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form id="userFilterForm">
            <div class="row">
                <div class="col-lg-3">
                    @include('users.filter')
                </div>
                <div class="col-lg-9 mt-2" id="result">
                    @include('users.results')
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
                
            function fetch_data(page) {
                $.ajax({
                    url:"{{ route('index') }}?page="+page,
                    success:function(data){
                        $('#result').html(data);
                    }
                });
            }
        })
    </script>
@endsection

