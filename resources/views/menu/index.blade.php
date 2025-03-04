@extends('layouts.app')

@section('content')
    <h1><i class="fas fa-utensils"></i> Today's Menu</h1>
    <p>Welcome, {{ auth()->user()->username }}!</p>
    <a href="{{ route('menu.create') }}" class="add-dish" hx-get="{{ route('menu.create') }}" hx-target="#content" hx-push-url="true"><i class="fas fa-plus"></i> Add a New Dish</a>
    <form method="POST" action="{{ route('logout') }}" hx-post="{{ route('logout') }}" hx-target="#content" hx-swap="outerHTML">
    @csrf
    <button type="submit" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
</form>

    <div class="menu-grid" id="menu-grid" hx-get="{{ route('menu.index') }}" hx-trigger="every 5s">
        @foreach ($menus as $menu)
            <div class="menu-item">
                <h2><i class="fas fa-drumstick-bite"></i> {{ $menu->dish_name }}</h2>
                <p>{{ $menu->description }}</p>
                <p class="price">₱{{ number_format($menu->price, 2) }}</p>
                <p class="category">{{ $menu->category }}</p>
                <div class="actions">
                    <a href="{{ route('menu.edit', $menu->id) }}" class="edit" hx-get="{{ route('menu.edit', $menu->id) }}" hx-target="#content" hx-push-url="true"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="delete" hx-delete="{{ route('menu.destroy', $menu->id) }}" hx-confirm="Are you sure?" hx-target="#menu-grid" hx-swap="outerHTML"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection