<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Country State City Dropdown Using AJAX</h2>

                <div class="form-group mb-3">
                    <select name="" id="country-dd" class="form-control">
                        <option value="">Select Country</option>
                        @foreach ($countries as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <select name="" id="state-dd" class="form-control">
                        {{-- <option value="">Select State</option> --}}
                    </select>
                </div>
                <div class="form-group mb-3">
                    <select name="" id="city-dd" class="form-control">
                        {{-- <option value="">Select City</option> --}}
                    </select>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            // alert(idCountry);
            $('#state-dd').html('');

            $.ajax({
                url: "/api/fetch-state",
                type: 'POST',
                dataType: 'json',
                data: {country_id: idCountry,_token:"{{ csrf_token()}}"},
                success: function(response){
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(response.states,function(index, val){
                        $('#state-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                    $('#city-dd').html('<option value="">Select City</option>'); 
                }
            })
        });
        $('#state-dd').change(function(event) {
            var idState = this.value;
            // alert(idCountry);
            $('#city-dd').html('');

            $.ajax({
                url: "/api/fetch-city",
                type: 'POST',
                dataType: 'json',
                data: {state_id: idState,_token:"{{ csrf_token()}}"},
                success: function(response){
                    $('#city-dd').html('<option value="">Select State</option>');
                    $.each(response.cities,function(index, val){
                        $('#city-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                }
            })
        });
    });
    </script>
</body>
</html>