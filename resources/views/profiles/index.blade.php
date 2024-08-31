@extends('layout')

@section('pageTitle', 'Liste des profils')

@section('title', 'Parcourez notre liste de profiles')

@section('content')
<style>
.elips{
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

@if(Auth::guard('admin')->check())
    <p>Bienvenue, Administrateur !</p>
@else
    <p>Vous n'êtes pas connecté en tant qu'administrateur.</p>
@endif


    <div class="flex flex-col items-center mt-8 max-w-3xl mx-auto">

        <table class="bg-grey border w-3/4">
            <thead class="bg-gray-100">
                <tr class="text-center">
                    <th class="w-[60px]">Image</th>
                    <th class="w-[200px]">Prénom</th>
                    <th class="w-[200px]">Nom</th>
                    <th class="w-[60px]">Détails</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)

                    @php
                        //if user is admin : else $bg_color = ''
                        $bg_color = match($profile->status) {
                            'actif' => 'bg-green-300',
                            'en attente' => 'bg-orange-300',
                            'inactif' => 'bg-red-300',
                            default => 'bg-gray-300',
                        };
                    @endphp

                    <tr class="text-center {{ $bg_color }}">
                        <td ><img src="{{ asset('storage/' . $profile->image) }}" alt="Image de profil" width='20px' height='20px' class="mx-auto" style="border-radius: 50%;"></td>
                        <td class="text-truncate elips">{{ $profile->first_name }}</td>
                        <td class="text-truncate elips">{{ $profile->last_name }}</td>
                        <td class="text-right">
                            <button onclick="window.location='{{ route('profiles.details', ['id' => $profile->id]) }}'" 
                                class="text-2xl inline-block transform transition-transform duration-120 hover:scale-110">
                                ➡️
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-1">
            {{ $profiles->links() }}
        </div>

    </div>

@endsection