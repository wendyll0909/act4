@extends('layouts.app')

@section('content')
    <h1><i class="fas fa-plus-circle"></i> Add a New Dish</h1>
    <form hx-post="{{ route('menu.store') }}" hx-target="#content" hx-swap="outerHTML">
        @csrf
        <label for="dish_name"><i class="fas fa-drumstick-bite"></i> Dish Name:</label>
        <input type="text" name="dish_name" required>
        <label for="description"><i class="fas fa-align-left"></i> Description:</label>
        <textarea name="description" required></textarea>
        <label for="price"><i class="fas fa-money-bill"></i> Price:</label>
        <input type="number" step="0.01" name="price" required>
        <label for="category"><i class="fas fa-list"></i> Category:</label>
        <select name="category" required>
            <option value="Appetizer">Appetizer</option>
            <option value="Main Course">Main Course</option>
            <option value="Dessert">Dessert</option>
            <option value="Beverage">Beverage</option>
        </select>
        <button type="submit"><i class="fas fa-save"></i> Add Dish</button>
    </form>
    <a href="{{ route('menu.index') }}" class="back-link" hx-get="{{ route('menu.index') }}" hx-target="#content" hx-push-url="true"><i class="fas fa-arrow-left"></i> Back to Menu</a>
@endsection