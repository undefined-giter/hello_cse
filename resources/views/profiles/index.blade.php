@extends('layout')

@section('pageTitle', 'Liste des profils')

@section('title', 'Parcourez notre liste de profiles')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 mt-8">
        @foreach ($profiles as $profile)
            {{-- @include('shared/profilCard') --}}
        @endforeach
    </div>

@endsection