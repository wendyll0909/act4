@extends('layouts.app')

@section('content')
    <div class="container">
        <h1><i class="fas fa-lock"></i> Login</h1>
        @if ($errors->has('username'))
            <p class="error">{{ $errors->first('username') }}</p>
        @endif
        <form method="POST" action="{{ route('login') }}" hx-post="{{ route('login') }}" hx-target="#content" hx-swap="outerHTML">
            @csrf
            <label for="username"><i class="fas fa-user"></i> Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
            <label for="password"><i class="fas fa-key"></i> Password:</label>
            <input type="password" name="password" required>
            <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}" class="back-link" hx-get="{{ route('register') }}" hx-target="#content" hx-push-url="true"><i class="fas fa-user-plus"></i> Register here</a></p>
    </div>
@endsection