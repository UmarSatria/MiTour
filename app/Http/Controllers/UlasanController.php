<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pemesanan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    // ...

    public function create($id)
    {
        $wisata = Admin::all();
        $ulasan = [];

        foreach ($wisata as $w) {
            $pemesanan = Pemesanan::where('user_id', $w->id)->first();

            $ulasan[$w->id] = Ulasan::with('pemesanan.user')->where('admin_id', $w->id)->first();
        }

        return view('user.ulasan', compact('pemesanan', 'wisata', 'ulasan', 'id'));
    }


    public function store(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'komentar' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ], [
            'komentar.required' => 'Berikan Ulasan Anda',
            'rating.required' => 'Berikan Rating untuk Wisata',
            'rating.numeric' => 'Rating harus berupa angka',
            'rating.min' => 'Rating harus diisi minimal 1',
            'rating.max' => 'Rating tidak boleh melebihi 5',
        ]);

        $ulasan = Ulasan::create([
            'admin_id' => $id,
            'komentar' => $request->komentar,
            'rating' => $request->rating,
        ]);

        $ulasan->save();
        return response()->json(['success' => true]);
    }

// ...

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
