@extends('layouts.app')

@section('content')
    <div class="container">
        <h1><i class="fas fa-user-plus"></i> Register</h1>
        @if ($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
        @endif
        <form method="POST" action="{{ route('register') }}" hx-post="{{ route('register') }}" hx-target="#content" hx-swap="outerHTML">
            @csrf
            <label for="username"><i class="fas fa-user"></i> Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" required>
            @error('username')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <label for="password"><i class="fas fa-key"></i> Password:</label>
            <input type="password" name="password" required>
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <label for="password_confirmation"><i class="fas fa-key"></i> Confirm Password:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit"><i class="fas fa-user-plus"></i> Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('login') }}" class="back-link" hx-get="{{ route('login') }}" hx-target="#content" hx-push-url="true"><i class="fas fa-sign-in-alt"></i> Login here</a></p>
    </div>
@endsection