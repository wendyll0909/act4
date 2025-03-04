@extends('layouts.app')

@section('content')
    <h1><i class="fas fa-edit"></i> Edit Dish</h1>
    <form hx-put="{{ route('menu.update', $menu->id) }}" hx-target="#content" hx-swap="outerHTML">
        @csrf
        @method('PUT')
        <label for="dish_name"><i class="fas fa-drumstick-bite"></i> Dish Name:</label>
        <input type="text" name="dish_name" value="{{ $menu->dish_name }}" required>
        <label for="description"><i class="fas fa-align-left"></i> Description:</label>
        <textarea name="description" required>{{ $menu->description }}</textarea>
        <label for="price"><i class="fas fa-money-bill"></i> Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $menu->price }}" required>
        <label for="category"><i class="fas fa-list"></i> Category:</label>
        <select name="category" required>
            <option value="Appetizer" {{ $menu->category == 'Appetizer' ? 'selected' : '' }}>Appetizer</option>
            <option value="Main Course" {{ $menu->category == 'Main Course' ? 'selected' : '' }}>Main Course</option>
            <option value="Dessert" {{ $menu->category == 'Dessert' ? 'selected' : '' }}>Dessert</option>
            <option value="Beverage" {{ $menu->category == 'Beverage' ? 'selected' : '' }}>Beverage</option>
        </select>
        <button type="submit"><i class="fas fa-save"></i> Update Dish</button>
    </form>
    <a href="{{ route('menu.index') }}" class="back-link" hx-get="{{ route('menu.index') }}" hx-target="#content" hx-push-url="true"><i class="fas fa-arrow-left"></i> Back to Menu</a>
@endsection