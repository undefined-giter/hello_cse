@extends('layout')

@section('pageTitle', 'Détails')

@section('title', 'Détails du profil')

@section('content')

@php
    $text_status = match($profile->status) {
        'actif' => 'Est complètement opérationnel',
        'en attente' => 'Est en attente de validation',
        'inactif' => 'Le compte n\'est pas encore configuré ou a été révoqué',
        default => 'Statut actuel inconnu',
    };
@endphp

    <div class="p-6 bg-gray-200 shadow-md rounded-lg max-w-2xl mx-auto mt-8">
        <div class="relative">
            <img src="{{ asset('storage/' . $profile->image) }}" alt="Image de profil" width='80px' height='25px' class="rounded-full mx-auto">
            
            <div class="absolute top-0 right-16 text-2xl">
                {{ $profile->status == 'actif' ? '🟢' : ($profile->status == 'inactif' ? '🔴' : '🟠') }}
            </div>

            <div class="flex flex-col text-center">
                <p class="text-xl font-semibold text-gray-900 mb-1 break-words mt-3">{{ $profile->first_name }} {{ $profile->last_name }}</p>
            </div>        

            <div class="flex space-x-6 my-3 text-gray-800 justify-center">
                {{ $text_status }}
            </div>
        
            <div class="flex space-x-6 text-gray-600 mb-4 justify-center">
                <p class="text-gray-900 mr-6"><small class="text-xs">Profil créé à </small>{{ $profile->created_at->format('H\h \l\e d/m/y') }}</p> 
                <p class="text-gray-900"><small class="text-xs ml-12">Profil mis à jour à </small>{{ $profile->updated_at->format('H\h \l\e d/m/y') }}</p>
            </div>
        </div>
        <div class="flex">
            <form action="{{ route('profiles.delete', ['id' => $profile->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mr-auto ml-14">Supprimer</button>
            </form>            
            <button class="btn btn-primary ml-auto mr-14" onclick="window.location='{{ route('profiles.edit', ['id' => $profile->id]) }}'">Modifier</button>
        </div>
    </div>
@endsection