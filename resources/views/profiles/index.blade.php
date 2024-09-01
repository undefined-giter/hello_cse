@extends('layout')

@section('pageTitle', 'Liste des profils')

@section('title', 'Parcourez notre liste de profils ' . $status_displayed)

@section('content')

    <div class="flex flex-col items-center mt-8 max-w-3xl mx-auto">

        <table class="bg-grey border w-3/4">
            <thead class="bg-gray-400">
                <tr class="text-center">
                    <th class="w-[60px]">Image</th>
                    <th class="w-[180px]">Prénom</th>
                    <th class="w-[180px]">Nom</th>
                    <th class="w-[90px] whitespace-nowrap">Mise à jour</th>
                    @if(Auth::guard('admin')->check())
                        <th class="w-[60px]">Détails</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $index => $profile)

                    @php
                        $bg_color = match($profile->status) {
                            'actif' => 'bg-green-500',
                            'en attente' => 'bg-orange-500',
                            'inactif' => 'bg-red-500',
                            default => '',
                        };
                    @endphp

                    <tr class="text-center bg-gray-200 {{ $bg_color }}">
                        <td ><img src="{{ asset('storage/' . $profile->image) }}" alt="Image de profil" width='20px' height='20px' class="mx-auto" style="border-radius: 50%;"></td>
                        <td class="text-truncate elips">{{ $profile->first_name }}</td>
                        <td class="text-truncate elips">{{ $profile->last_name }}</td>
                        <td class="text-truncate elips">{{ $profile->updated_at->format('d/m/y') }}</td>
                        @if(Auth::guard('admin')->check())
                            <td class="text-right">
                                <button onclick="window.location='{{ route('profiles.details', ['id' => $profile->id]) }}'" 
                                    class="text-2xl inline-block transform transition-transform duration-120 hover:scale-110">
                                    ➡️
                                </button>
                            </td>
                        @endif
                    </tr>
                    @if(($index + 1) % 5 == 0 && $index + 1 != $profiles->count())
                        <tr>
                            <td colspan="{{ Auth::guard('admin')->check() ? 5 : 4 }}" class="border-t-2 border-gray-400"></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="mt-1">
            {{ $profiles->links() }}
        </div>

    </div>

@endsection