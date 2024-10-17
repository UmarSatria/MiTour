<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function showJadwal() {
        $wisata = Admin::all();
        $jadwal = Jadwal::all();
        return view('user.jadwal', compact('wisata', 'jadwal'));
    }

    public function jadwal(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'hari' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ],[
            'hari' => 'Isi hari',
            'jam_buka' => 'Isi Jadwal buka',
            'jam_tutup' => 'Isi Jadwal tutup',
        ]);

        Jadwal::create([
            'admin_id' => $id,
            'hari' => $request->hari,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan');
    }

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
