<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Exports\ItemsExport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->orderBy('id', 'desc')->paginate(10);

        return view('admin.items', compact('items'));
    }

    public function create()
    {
        $categories = Category::select('*')->orderBy('name', 'asc')->get();

        return view('admin.items_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'total' => 'required|integer|min:0'
        ]);

        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'total' => $request->total
        ]);

        return redirect('/admin/items')->with('success', 'Berhasil menambahkan item');
    }

    public function edit(Item $item)
    {
        $categories = Category::select('*')->orderBy('name', 'asc')->get();

        return view('admin.items_edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $available = $item->total - $item->repair - $item->lending;

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'total' => 'required|integer|min:0',
            'broke_item' => 'nullable|integer|min:0|max:' . $available
        ], [
            'broke_item.max' => 'New broke item tidak boleh lebih dari available items (' . $available . ').'
        ]);

        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'total' => $request->total,
            'repair' => $item->repair + ($request->broke_item ?? 0)
        ]);

        return redirect('/admin/items')->with('success', 'Berhasil memperbarui item');
    }

    public function export()
    {
        return Excel::download(new ItemsExport, 'items.xlsx');
    }
}
