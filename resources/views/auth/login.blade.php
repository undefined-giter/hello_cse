@extends('layout')

@section('pageTitle', 'Connection')

@section('title', 'Connection Administrateur')

@section('content')

    <div class="d-flex justify-content-center m-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-2">Se connecter</button>
            </div>
        </form>
    </div>

@endsection