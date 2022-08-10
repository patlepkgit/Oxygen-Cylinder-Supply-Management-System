@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">{{ __('Supplier Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <input type="radio" name="gender" value="male" required autocomplete="gender"> Male
                                <input type="radio" name="gender" value="female" > Female<br>    
                                
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                            <div class="col-md-6">
                               <input type="text" name="age" size="3" class="form-control @error('age') is-invalid @enderror"  value="{{ old('age') }}" required autocomplete="age" autofocus>          
                               @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Adhar Number') }}</label>
                            <div class="col-md-6">
                               <input type="text" name="adhar_id" class="form-control @error('adhar_id') is-invalid @enderror"  value="{{ old('adhar_id') }}" required autocomplete="adhar_id" autofocus> 
                               
                               @error('adhar_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('ID Proof') }}</label>
                            <div class="col-md-6">
                            <input type="file" id="id_proof" name="id_proof" class="form-control @error('id_proof') is-invalid @enderror"  value="{{ old('id_proof') }}" required autocomplete="id_proof" autofocus> 
                            @error('id_proof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror          
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                               <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}" required autocomplete="address" autofocus>  
                                </textarea>
                               @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group mb-3">
                        <select  name="state" id="state-dd" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($states as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <select name="city" id="city-dd" class="form-control">
                            </select>
                        </div> -->

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                            <div class="col-md-6">
                            <select name="state" id="state-dd" class="form-control @error('state') is-invalid @enderror"  value="{{ old('state') }}" required autocomplete="state" autofocus>
                                <option value="">Select State</option>
                                    @foreach ($states as $data)
                                    <option value="{{$data->id}}" >
                                    {{$data->name}}
                                </option>
                            @endforeach
                            </select> 
                            @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror        
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-6">
                            <select name="city" id="city-dd" class="form-control @error('city') is-invalid @enderror"  value="{{ old('city') }}" required autocomplete="city" autofocus>
                                
                            </select>  
                            @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror          
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                               <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" required autocomplete="phone" autofocus >           
                               @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // $('#country-dd').on('change', function () {
            //     var idCountry = this.value;
            //     $("#state-dd").html('');
            //     $.ajax({
            //         url: "{{url('api/fetch-states')}}",
            //         type: "POST",
            //         data: {
            //             country_id: idCountry,
            //             _token: '{{csrf_token()}}'
            //         },
            //         dataType: 'json',
            //         success: function (result) {
            //             $('#state-dd').html('<option value="">Select State</option>');
            //             $.each(result.states, function (key, value) {
            //                 $("#state-dd").append('<option value="' + value
            //                     .id + '">' + value.name + '</option>');
            //             });
            //             $('#city-dd').html('<option value="">Select City</option>');
            //         }
            //     });
            // });
            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value.id+ '">' + value.name + '</option>');
                        });
                    }
                });
            });


            
        });

    </script>

@endsection