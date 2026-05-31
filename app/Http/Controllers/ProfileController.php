<?php


namespace App\Http\Controllers;


use App\Models\User;


class ProfileController extends Controller
{
public function show(User $user)
{
// Jika lihat profil sendiri → tampilkan semua item
// Jika lihat profil orang lain → hanya yang approved
$items = $user->items()
->latest()
->get();


return view('profile.show', compact('user', 'items'));
}
}