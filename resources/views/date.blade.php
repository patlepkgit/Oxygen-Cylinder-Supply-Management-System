<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script>
    var $d = jQuery.noConflict();
    $d(function () {
    $d('.datetimepicker').datepicker({
        viewMode:'years'
    });
    });
</script>

</head>
<body>
    

<div class="form-group row dateBlock">
    <label class="col-md-4 col-form-label text-md-right">{{ __('Date of Covid-19 Positive') }}</label>
        <div class="col-md-6">
            <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror datetimepicker" value="{{ old('date') }}"  required autocomplete="date" autofocus> 
            
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
</div>


</body>
</html>