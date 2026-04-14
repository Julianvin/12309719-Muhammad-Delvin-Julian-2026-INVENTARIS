<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LendingController extends Controller
{
    public function index()
    {
        $lendings = Lending::with(['item', 'user'])->orderBy('id', 'desc')->get();
        return view('operator.lending', compact('lendings'));
    }

    public function operatorItems()
    {
        $items = Item::with('category')->paginate(10);
        return view('operator.items', compact('items'));
    }

    public function create()
    {
        $items = Item::all()->filter(function($item) {
            return ($item->total - $item->repair - $item->lending) > 0;
        });

        return view('operator.lending_create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'items' => 'required|array',
            'items.*' => 'required|exists:items,id',
            'totals' => 'required|array',
            'totals.*' => 'required|integer|min:1',
            'ket' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->items as $index => $itemId) {
                $item = Item::lockForUpdate()->find($itemId);
                $totalRequested = $request->totals[$index];
                $available = $item->total - $item->repair - $item->lending;

                if ($totalRequested > $available) {
                    throw new \Exception("Total item more than available!");
                }

                // Create lending record
                Lending::create([
                    'item_id' => $itemId,
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'total' => $totalRequested,
                    'ket' => $request->ket,
                ]);

                // Update item lending count
                $item->increment('lending', $totalRequested);
            }

            DB::commit();
            return redirect('/operator/lending')->with('success', 'Success add new lending items!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function returnItem(Lending $lending)
    {
        if ($lending->returned_at) {
            return back()->with('error', 'Item already returned');
        }

        try {
            DB::beginTransaction();

            $lending->update([
                'returned_at' => now(),
            ]);

            // Adjust stock
            $lending->item->decrement('lending', $lending->total);

            DB::commit();
            return back()->with('success', 'Item returned successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to return item');
        }
    }

    public function destroy(Lending $lending)
    {
        try {
            DB::beginTransaction();

            // If not returned, restore stock before deleting
            if (!$lending->returned_at) {
                $lending->item->decrement('lending', $lending->total);
            }

            $lending->delete();

            DB::commit();
            return back()->with('success', 'Lending record deleted');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete record');
        }
    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\LendingsExport, 'lendings.xlsx');
    }

    public function detail(Item $item)
    {
        $lendings = Lending::with(['item', 'user'])
            ->where('item_id', $item->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('operator.lending', [
            'lendings' => $lendings,
            'isDetail' => true,
            'backUrl' => Auth::user()->role === 'admin' ? url('/admin/items') : url('/operator/items')
        ]);
    }
}
