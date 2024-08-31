<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $adminPage = Str::contains(Route::currentRouteName(), 'admin') ? true : false;
            $titleSuffix  = $adminPage ? '| Administration' : '';
        @endphp
        <title>@yield('pageTitle', 'Hello CSE') {{ $titleSuffix }}</title>
        
        @vite('resources/css/app.css')
    </head>
    <body>
        @php
            $route = request()->route()->getName();
        @endphp

        <nav class="navbar navbar-expand-lg navbar-dark flex items-center justify-between" style="background:#0D3C4D">
            <div class="flex-1">
                <a href="{{ route('homepage') }}"><img class="ml-2" src="{{ asset('storage/hello_cse.png') }}" alt="Logo HelloCSE" width="200px">
                </a>
            </div>

            <div class="flex-1">
                <button class="btn btn-primary w-[180px] mx-auto {{ str_contains($route, 'profiles.list') ? 'active outline outline-2 outline-green-500' : '' }}" 
                    onclick="window.location='{{ route('profiles.list') }}'">
                    Liste des profiles
                </button>
            </div>

            <div class="flex-1 text-right">
                @if(true) {{-- $adminUser --}}
                    <button class="btn btn-primary mr-2 h-[38px] {{ str_contains($route, 'login') ? 'active outline outline-2 outline-green-500' : '' }}"
                        onclick="window.location='{{ route('login') }}'" title='La connexion est réservée aux administrateurs seulement'>
                        Connexion<span class="text-[10px] text-gray-600" style="display: block; margin-top: -6px;">Administrateurs seulement</span>
                    </button>
                @endif
            </div>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary mr-2 h-[38px]">
                Déconnexion
                <span class="text-[10px] text-gray-600" style="display: block; margin-top: -6px;">Administrateurs seulement</span>
            </button>
        </form>
        

        @if (session('success'))
            <div class="flash_message fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white text-center px-4 py-2 rounded shadow-lg z-50">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="flash_message fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-500 text-white text-center px-4 py-2 rounded shadow-lg z-50">
                {{ session('error') }}
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <h1 class="text-center text-lg mt-8">
            @yield('title', $titleSuffix )
        </h1>

        @yield('content')
        
        @vite('resources/js/app.js')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    var flash_message = document.getElementById('flash_message');
                    if (flash_message) {
                        flash_message.style.transition = 'opacity 0.5s ease';
                        flash_message.style.opacity = '0';
                        setTimeout(() => flash_message.remove(), 500);
                    }
                }, 3000);
            });
        </script>
    </body>
</html>
