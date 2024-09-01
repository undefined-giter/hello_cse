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
            <div class="flex justify-start">
                <a href="{{ route('homepage') }}"><img class="ml-2" src="{{ asset('storage/hello_cse.png') }}" alt="Logo HelloCSE" width="118px"></a>
            </div>

            <div class="flex flex-1 justify-center">
                <button class="btn btn-primary w-[180px] {{ str_contains($route, 'profiles.list') ? 'active outline outline-2 outline-green-500' : '' }}" 
                    onclick="window.location='{{ route('profiles.list') }}'">
                    Liste des profils
                </button>
            </div>

            <div class="flex">
                @if(!Auth::guard('admin')->check())
                    <button class="btn btn-primary mr-2 h-[38px] {{ str_contains($route, 'login') ? 'active outline outline-2 outline-green-500' : '' }}"
                        onclick="window.location='{{ route('login') }}'" title='La connexion est réservée aux administrateurs seulement'>
                        Connexion<span class="text-[10px] text-gray-400" style="display: block; margin-top: -6px;">Administrateurs seulement</span>
                    </button>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary mr-2 h-[38px]">
                            Déconnexion
                        </button>
                    </form>                    
                @endif
            </div>
        </nav>
        
        <hr class="w-full border-t-2 border-gray-300">

        @php
            $flashMessageClass = 'flash_message fixed top-12 left-1/2 transform -translate-x-1/2 text-white text-center px-4 py-2 rounded shadow-lg z-50';
        @endphp
        @if (session('success'))
            <div class="{{ $flashMessageClass }} bg-green-500">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="{{ $flashMessageClass }} bg-red-500">
                {{ session('error') }}
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (request()->has('error'))
            <div class="{{ $flashMessageClass }} bg-red-500">
                {{ request('error') }}
            </div>
        @endif
    
        <main>
            <h1 class="text-center text-lg mt-8">@yield('title', $titleSuffix )</h1>
    
            @yield('content')
        </main>
        
        @vite('resources/js/app.js')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    var flash_messages = document.querySelectorAll('.flash_message')
                    flash_messages.forEach(function(flash_message) {
                        flash_message.style.transition = 'opacity 0.5s ease'
                        flash_message.style.opacity = '0';
                        setTimeout(() => flash_message.remove(), 500)
                    })
                }, 3000)
            })
        </script>
    </body>
</html>
