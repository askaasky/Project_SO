<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * DASHBOARD + SEARCH
     */
    public function dashboard(Request $request)
    {
        $query = Item::with(['user', 'category', 'location'])
            ->latest();

        // 🔍 SEARCH JUDUL
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER KATEGORI
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $items = $query->get();

        // COUNTER USER
        $lostCount = Item::where('user_id', auth()->id())
            ->where('status', 'lost')
            ->count();

        $foundCount = Item::where('user_id', auth()->id())
            ->where('status', 'found')
            ->count();

        return view('items.dashboard', [
            'items'      => $items,
            'categories' => Category::all(),
            'locations'  => Location::all(),
            'lostCount'  => $lostCount,
            'foundCount' => $foundCount,
        ]);
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        return view('items.create', [
            'categories' => Category::all(),
            'locations'  => Location::all(),
        ]);
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|in:lost,found',
            'category_id' => 'required',
            'location_id' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }

        Item::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Postingan berhasil dibuat');
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            abort(403);
        }

        return view('items.edit', [
            'item'       => $item,
            'categories' => Category::all(),
            'locations'  => Location::all(),
        ]);
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|in:lost,found',
            'category_id' => 'required',
            'location_id' => 'required',
        ]);

        $item->update([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Postingan berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function destroy(Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            abort(403);
        }

        $item->delete();

        return back()->with('success', 'Postingan dihapus');
    }
}
