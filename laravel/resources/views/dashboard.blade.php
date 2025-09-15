@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <h2>Welcome, {{ Auth::user()->name }}!</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        
@endsection