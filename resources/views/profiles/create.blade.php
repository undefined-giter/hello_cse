@extends('layouts.app')

@section('content')
    <h1>Créer un Profil</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        </div>
        <div>
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <option value="inactif">Inactif</option>
                <option value="en attente">En attente</option>
                <option value="actif">Actif</option>
            </select>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection
