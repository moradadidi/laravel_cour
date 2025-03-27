@extends('layout') {{-- Change 'layout' to your actual layout file name if different --}}

@section('title', 'User Profile')

@section('content')
    <h1>User Profile</h1>
    @if($user)
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
        
    @else
        <p>No user found.</p>
    @endif
@endsection
