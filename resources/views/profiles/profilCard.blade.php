@extends('layout')

@section('pageTitle', 'Détails')

@section('title', 'Détails du profile')

@section('content')

@php
    $text_status = match($profile->status) {
        'actif' => 'Is fully operationnal',
        'en attente' => 'Is waiting for a validation',
        'inactif' => 'Account not set yet or revoqued',
        default => 'Current status unknow',
    };
@endphp

<div class="p-6 bg-gray-200 shadow-md rounded-lg max-w-2xl mx-auto">
    <div class="mx-12">

        <div class="flex">
            <img src="{{ asset('storage/' . $profile->image) }}" alt="Image de profil" width='25px' height='25px' class="text-center" rounded>
    
            <div class="text-right mr-6 text-2xl">{{ $profile->status == 'actif' ? '🟢' : ($profile->status == 'inactif' ? '🔴' : '🟠') }}</div>
        </div>

        <div class="flex">
            <p class="text-lg font-semibold text-gray-800 mb-2 text-center break-words">{{ $profile->firt_name }} </p>
            <p class="text-2xl font-semibold text-gray-800 mb-2 text-center break-words">{{ $profile->last_name }}</p>
        </div>

        <div class="flex space-x-6 text-gray-600 mb-4 justify-center">
            <p>{{ $text_status }}</p>
        </div>
    
        <div class="flex space-x-6 text-gray-600 mb-4 justify-center">
            <p class="text-gray-500 text-left"><small class="text-xs">Profil créé à </small>{{ $profile->updated_at->format('H\h \l\e d/m/y') }}</p> 
            <p class="text-gray-500 text-right"><small class="text-xs">Profil mis à jour à </small>{{ $profile->updated_at->format('H\h \l\e d/m/y') }}</p>
        </div>
    </div>
</div>

@endsection