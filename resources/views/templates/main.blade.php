<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token"  content="{{ csrf_token() }}"> 

        <title>{{ config('app.name',' User managment System')}}</title>

        

        <!-- Styles -->
      
        <link href="{{ asset('css/app.css')}}"  rel="stylesheet">
        <!-- JS -->
        <script src="{{ asset('js/app.js') }} " defer ></script>
    </head>
    <body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <a class="navbar-brand" href="#">{{  config('app.name',' User managment System')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
            @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                class="text-sm text-gray-700 underline">logout</a>
                                <form id="logout-form" action=" {{ route('logout') }} " method="POST" style="display: none">
                                  @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

            
            </div>
        </div>
</nav>
 @can('loged-in')
 <nav class="navbar navbar-expand-lg navbar-light bg-light">

     <div class="container">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @can('is-admin')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                </li>
                 @endcan
            </ul>
     </div> 
           
 </nav>
 @endcan
        <main class="container">
         @include('partials.alerts')
         @yield('content')
        </main>
    </body>
</html>
