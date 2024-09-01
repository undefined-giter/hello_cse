@extends('layout')

@section('pageTitle', 'Bienvenue')

@section('title', 'HelloCSE & Vous')

@section('content')

    <div class="flex items-center justify-center pt-24">
        <div class="bg-white p-7 rounded-lg shadow-lg max-w-lg text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenue Chez HelloCSE !</h1>
            <p class="text-gray-600 text-lg">Sentez-vous libre d'utiliser la barre de navigation pour explorer les fonctionnalités de notre site.</p>
            <div class="mt-6">
                <a href="{{ route('profiles.list') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition">
                    Voir la liste des profils
                </a>
            </div>
        </div>
    </div>

@endsection