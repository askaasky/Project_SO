<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalItems'    => Item::count(),

            // biarin ada, tapi nilainya netral
            'pendingItems'  => 0,
            'approvedItems' => Item::count(),

            'totalUsers'    => User::count(),
            'latestItems'   => Item::latest()->take(5)->get(),
        ]);
    }

    public function items()
    {
        return view('admin.items', [
            // SEMUA BARANG LANGSUNG TAMPIL
            'items' => Item::latest()->get(),

            // biarin ada supaya blade lama gak error
            'pendingItems'  => collect(),
            'approvedItems' => collect(),
        ]);
    }

    // 🔒 DIPERTAHANKAN BIAR ROUTE / FORM LAMA GAK ERROR
    public function approve(Item $item)
    {
        // sekarang approve = no-op
        return back();
    }

    // ❌ reject SEKARANG ARTINYA HAPUS POSTINGAN
    public function reject(Item $item)
    {
        $item->delete();

        return back()->with('success', 'Postingan berhasil dihapus');
    }

    public function users(Request $request)
    {
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        if (!in_array($sort, ['created_at', 'nim', 'name'])) {
            $sort = 'created_at';
        }

        $users = User::orderBy($sort, $direction)->get();

        return view('admin.users', [
            'users' => $users,
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    // alias supaya route admin.items.delete gak error
    public function deleteItem(Item $item)
    {   
        return $this->reject($item);
    }

    // ✅ INI YANG KURANG (WAJIB ADA)
    // dipakai oleh route: admin.items.destroy
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('admin.items')
            ->with('success', 'Postingan berhasil dihapus');
    }
}
