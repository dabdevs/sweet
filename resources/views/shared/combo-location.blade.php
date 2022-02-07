@section('js')
    <script>
        function submitFilterForm() {
            let url = "{{ route('index') }}";
            let data = $('#userFilterForm').serializeArray();
            
            $.ajax({
                url: url,
                type: "GET",
                datatype : 'html',
                data: data,
                beforeSend: function() {
                    Swal.fire('Buscando...')
                    Swal.showLoading()
                },
                success: function (data) {
                    $('#result').html(data);
                    Swal.close();
                },
                error:function (response) {
                    console.log(response)
                    Swal.close();
                }
            });
        }

        function getCities() {
            let countryId = $('#country').val();
            
            if (countryId == '') {
                $('#city').empty()
                return;
            }

            let $select = $('#city').empty()
            let $selectLocation = $('#location').empty()

            $.ajax({
                url: "{{ route('get-cities', ['country_id' => ':country_id']) }}".replace(':country_id',
                    countryId),
                success: function(response) {
                    if (response.length > 0) {
                        $select.append($('<option value="">Selecciona una opción</option>'))
                        for (var key in response) {
                            $select.append($('<option value="' + response[key].id + '">' + response[key].name +
                                '</option>'))
                        }

                        $select.prop('disabled', false)
                    } else {
                        $select.prop('disabled', true)
                        $selectLocation.prop('disabled', true)
                    }
                },
                error: function() {
                    alert.log("Ha habido un error.");
                }
            });
        }

        function getLocations() {
            let cityId = $('#city').val();
        
            if (cityId == '') {
                $('#location').empty()
                return;
            }
            
            let $select = $('#location').empty()

            $.ajax({
                url: "{{ route('get-locations', ['city_id' => ':city_id']) }}".replace(':city_id', cityId),
                success: function(response) {
                    $select = $('#location').empty()
                    if (response.length > 0) {
                        $select.append($('<option value="">Selecciona una opción</option>'))
                        for (var key in response) {
                            $select.append($('<option value="' + response[key].id + '">' + response[key].name +
                                '</option>'))
                        }
                        $select.prop('disabled', false)
                    } else {
                        $select.prop('disabled', true)
                    }
                },
                error: function() {
                    alert.log("Ha habido un error.");
                }
            });
        }
    </script>
@endsection

