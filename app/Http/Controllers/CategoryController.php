<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withSum('items', 'total')->withCount('items')->orderBy('id', 'desc')->get();

        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'division_pj' => $request->division
        ]);

        return redirect('/admin/categories')->with('success', 'Berhasil menambahkan kategori');
    }

    public function edit(Category $category)
    {
        return view('admin.categories_edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'division' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'division_pj' => $request->division
        ]);

        return redirect('/admin/categories')->with('success', 'Berhasil memperbarui kategori');
    }
}
