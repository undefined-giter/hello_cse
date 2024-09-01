@extends('layout')

@php
    $update = isset($update) ? true : false
@endphp

@section('pageTitle', $update ? 'Modifier Profil' : 'Ajouter Profil')

@section('title', $update ? 'Modifier le profil' : 'Ajouter un nouveau profil')

@section('content')

    <div class="max-w-xl mx-auto mt-8">
        <form action="{{ $update ? route('profiles.update', $profile->id) : route('profiles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($update ? 'put' : 'post')

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700">Prénom</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $profile->first_name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg">
                @error('first_name')<small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>@enderror()
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700">Nom</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $profile->last_name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg">
                @error('last_name')<small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>@enderror()
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image de profil</label>
                @if($update && $profile->image)
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Image de profil" class="mb-2" width="100">
                @endif
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg">
                @error('image')<small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>@enderror()
                @if($update)
                    <div class="-mt-1">
                        <input type="checkbox" name="remove_img" id="remove_img" class="align-middle ml-2">
                        <label for="remove_img" class="text-orange-500"><small>Supprimer votre photo</small></label>
                        @error('remove_img')<small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>@enderror()
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Statut</label>
                <select name="status" id="status" required class="w-full px-4 py-2 border rounded-lg">
                    <option value="inactif" {{ (old('status', $profile->status ?? '') == 'inactif') ? 'selected' : '' }}>Inactif</option>
                    <option value="en attente" {{ (old('status', $profile->status ?? '') == 'en attente') ? 'selected' : '' }}>En attente</option>
                    <option value="actif" {{ (old('status', $profile->status ?? '') == 'actif') ? 'selected' : '' }}>Actif</option>
                </select>
                @error('status')<small class="absolute right-3 text-red-500 overflow-x-auto whitespace-nowrap -mt-1.5 max-w-full">{{ $message }}</small>@enderror()
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">{{ $update ? 'Mettre à jour' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>

@endsection
