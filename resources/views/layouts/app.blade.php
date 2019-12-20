<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BurnQuiz</title>
    <link rel="shortcut icon" href="storage/burnquiz_logow.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/scroll.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <link rel="stylesheet" href="{{asset('css/estilosIndex.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   
    


        

</head>
<body>
    <span id="home"></span>
    <div id="app">
        <nav id="menu" class="navbar navbar-expand-md navbar-light shadow-sm position-fixed w-100">
            <div class="container">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        <ul id="leftside" class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">HOME</a>
                        </li>                  
                        <li class="nav-item active">
                            <a class="nav-link" href="/ranking">RANKING</a>
                        </li>    
                        <li class="nav-item active">
                            <a class="nav-link" href="/preguntas/agregar">CARGA PREGUNTA</a>
                        </li>                         
                    
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRO') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->role =='admin') 
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin">PANEL ADMIN</a>
                            </li>  
                            @endif
                            </ul>
                            <img id="imgPerfil" src="/storage/{{Auth::user()->imagen}}" alt="">
                            <ul id="user" class="navbar-nav text-right">
                            <li class="nav-item dropdown ">
                            
                                <a id="navbarDropdown" class="nav-link" href="#" role="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user }} <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('X') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                            
                        </ul>
                        @endguest
                    
                </div>
            </div>
        </nav>
    </div>
        <main class="py-5">
            @yield('content')
        </main>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

<footer id="footer" style="margin-top: 500px;">
        <span style="width:30%;">BURN QUIZ | Un juego para pensar</span>
            <ul style="width:30%;">
                <li>Cordoba 2035</li>
                <li>Rosario</li>
                <li>Argentina</li>
            </ul>
            <ul style="width:30%;">
                <li><a href="http://facebook.com">Facebook</a></li>
                <li><a href="http://instagram.com">Instagram</a></li>
                <li><a href="http://youtube.com">YouTube</a></li>
            </ul>
    </footer>
</body>
</html>
