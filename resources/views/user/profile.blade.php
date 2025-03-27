@extends('layout') 

@section('title', 'User Profile')

@section('content')
    <h1>User Profile</h1>
    @if($user)
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <a href="{{ route('accueil') }}" class="btn btn-primary">logout</a><br>

    @else
        <p>No user found.</p>
    @endif
@endsection
