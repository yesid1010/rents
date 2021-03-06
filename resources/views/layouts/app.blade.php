<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rooms') }}</title>


        <!-- Icons -->
        <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- select piker --}}
    <link rel="stylesheet" href="vendors/css/picker.min.css">

    {{-- datatables --}}
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm navbar-fixed-top">
            <div class="container">
                @if(Auth::check())
                    <a class="navbar-brand text-white" href="{{ url('/rooms') }}">
                        Habitaciones
                    </a>
                @else 
                    <a class="navbar-brand text-white" href="{{ url('/rooms') }}">
                        Home
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <li	class="nav-item	dropdown navbar-brand ">
                                <a	class="nav-link text-white	dropdown-toggle"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"	
                                    aria-expanded="false">Arriendos
                                </a>
                                <div class="dropdown-menu">
                                    <form action="{{route('rents.index')}}" method="get">
                                        @csrf
                                        <input type="hidden" value="0" name="id">
                                        <input type="hidden" value="true" name="ab">
                                        <button class= "btn btn-ligth" type="submit">
                                            <i class="fa fa-pencil " aria-hidden="true"></i>
                                            Abiertos
                                        </button> 
                                    </form>
                                    <form action="{{route('rents.index')}}" method="get">
                                        @csrf
                                        <input type="hidden" value="1" name="id">
                                        <input type="hidden" value="false" name="ab">
                                        <button class= "btn btn-ligth" type="submit">
                                            <i class="fa fa-window-close" aria-hidden="true"></i>
                                            Cerrados
                                        </button> 
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item navbar-brand">
                                <a class="nav-link text-white" href="{{ route('services.index') }}">{{ __('Servicios') }}</a>

                            <li class="nav-item navbar-brand">
                                <a class="nav-link text-white" href="{{ route('users.index') }}">{{ __('Clientes') }}</a>
                            </li>

                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}"><b>{{ __('Login') }}</b> </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}"><b>{{ __('Register') }}</b> </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link navbar-brand dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{route('edit')}}">Perfil</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- scripts -->
            <!-- Bootstrap and necessary plugins -->
            @include('sweet::alert')
            <script src="vendors/js/jquery.min.js"></script>
            <script src="vendors/js/popper.min.js"></script>
            <script src="vendors/js/bootstrap.bundle.min.js"></script>
            <script src="vendors/js/bootstrap.min.js"></script>
            <script src="vendors/js/pace.min.js"></script>
            <!-- Plugins and scripts required by all views -->
            <script src="vendors/js/Chart.min.js"></script>
            <!-- GenesisUI main scripts -->
            <script src="vendors/js/template.js"></script>
            <!-- DataTables -->
            <script src="plugins/datatables/jquery.dataTables.js"></script>
            <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

            {{-- select piker --}}
            <script type="text/javascript" src="vendors/js/picker.min.js"></script>


    <script src="vendors/js/app.js"></script>
    <script src="{{ asset('js/modal.js') }}" ></script>
    
</body>
</html>
