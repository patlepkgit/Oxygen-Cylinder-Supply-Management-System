<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.head')

</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('name', 'Oxygen Supply') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('booking') }}">{{ __('Booking') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Supplier Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Supplier Register') }}</a>
                                </li>
                                
                            @endif
                            
                           
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('booking_status') }}">{{ __('Booking Status') }}</a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
           

            @if(View::hasSection('content'))
              @yield('content')
            @else
                
                <div class="container">
                <div class="text-center">
                <h2>Oxygen Cylinder</h2>
                <p>Data of all available oxygen cylinders.</p> 
                </div>
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>State</th>
                                <th>Supplier Name</th>
                                <th>Cylinder-qty(5 Ltr)</th>
                                <th>Cylinder-qty(10 Ltr)</th>
                                <th>Cylinder-qty(15 Ltr)</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->supplier_name }}</td>
                                <td>{{ $value->cyl_qty_5}}</td>
                                <td>{{ $value->cyl_qty_10}}</td>
                                <td>{{ $value->cyl_qty_15}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            @endif
        </main>
        
        
    </div>
</body>
</html>