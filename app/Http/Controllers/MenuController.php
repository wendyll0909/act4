<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dish_name' => 'required|string|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string|max:50',
        ]);

        Menu::create($request->all());
        return redirect()->route('menu.index')->with('success', 'Dish added!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dish_name' => 'required|string|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string|max:50',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('menu.index')->with('success', 'Dish updated!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response()->json(['success' => 'Dish deleted!']);
    }
}