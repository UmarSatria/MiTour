<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     * Show the form for creating a new resource.
     */

    public function showDetail($id) {
        $ulasan = Ulasan::find($id);
        $wisata =  Admin::find($id);
        return view('user.detail', compact('wisata' , 'id', 'ulasan'));
    }

    public function createPemesanan()
    {
        $pemesanan = pemesanan::all();
        return view('admin.data', compact('pemesanan'));
    }

    public function pesan($id) {
        $wisata = Admin::find($id);
        $pemesanan = Pemesanan::where('admin_id', $id)->first();
    return view('user.pesan', compact('pemesanan', 'id', 'wisata'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function pesanWisata(Request $request , $id)
    {
        $request->validate ([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_handphone' => 'required|string',
            'jumlah_tiket' => 'required|string',
        ],[
            'nama' => 'Isi Nama Lengkap Anda',
            'alamat' => 'Isi Alamat Anda',
            'no_handphone' => 'Isi Nomor Telephone Anda',
            'jumlah_tiket' => 'Masukkan Tiket yang ingin dipesan'
        ]);

        $wisata = Admin::find($id);
        $harga_tiket = $wisata->harga_tiket;

        // Menghitung total berdasarkan harga tiket dan jumlah tiket
        $total = $harga_tiket * $request->input('jumlah_tiket');
        Pemesanan::create ([
            'nama' => $request->input('nama'),
            'user_id' => Auth::id(),
            'admin_id' => $id,
            'alamat' => $request->input('alamat'),
            'no_handphone' => $request->input('no_handphone'),
            'jumlah_tiket' => $request->input('jumlah_tiket'),
            'total' => $total,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your order has been placed successfully!',
            'wisata' => $wisata,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {
        //
    }
}
