<?php

namespace App\Http\Controllers;

use Dotenv\Util\Str;
use App\Models\Wisata;
use App\Models\Admin;
use App\Models\Jadwal;
use Illuminate\Http\Request;


class wisatacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function wisata()
    {
        $wisata = Admin::all();
        $jadwal = Jadwal::all();
        return view('/admin/wisata',
           compact('wisata', 'jadwal')
        );
    }

    // ROUTE DASHBOARD USER
    public function userWisata() {
        $wisata = Admin::all();
        return view('user.wisata', compact('wisata'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/create', [
            'title' => 'Form | Tambah Wisata'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wisata' => 'required',
            'lokasi_wisata' => 'required',
            'img_wisata' => 'required',
            'desc_wisata' => 'required',
            'jumlah_tiket' => 'required',
            'harga_tiket' => 'required',
        ],[
            'nama_wisata' => 'Pilih Wisata',
            'lokasi_wisata' => 'Pilih Lokasi',
            'img_wisata' => 'Upload Gambar',
            'desc_wisata' => 'Isi Deskripsi Wisata',
            'jumlah_tiket' => 'Isi Jumlah Tiket',
            'harga_tiket' => 'Isi harga Tiket',
        ]);

        $file = $request->file('img_wisata');
        $fileName = $file->hashName();
        $file->storeAs('public/img', $fileName);

        $wisata = Admin::create([
            'nama_wisata' => $request->nama_wisata,
            'lokasi_wisata' => $request->lokasi_wisata,
            'img_wisata' => $fileName,
            'desc_wisata' => $request->desc_wisata,
            'jumlah_tiket' => intval($request->jumlah_tiket),
            'harga_tiket' => floatval($request->harga_tiket),
        ]);

        return redirect()->route('admin.wisata')->with('success' ,'Berhasil Menambahkan Data');
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
   // wisatacontroller.php

// ...

public function update(Request $request, $id)
{
    $this->validate($request, [
        'nama_wisata' => 'required',
        'lokasi_wisata' => 'required',
        'desc_wisata' => 'required',
        'jumlah_tiket' => 'required|numeric',
        'harga_tiket' => 'required|numeric',
    ], [
        'nama_wisata.required' => 'Pilih Wisata',
        'lokasi_wisata.required' => 'Pilih Lokasi',
        'desc_wisata.required' => 'Isi Deskripsi Wisata',
        'jumlah_tiket.required' => 'Isi Jumlah Tiket',
        'jumlah_tiket.numeric' => 'Jumlah Tiket harus angka',
        'harga_tiket.required' => 'Isi Harga Tiket',
        'harga_tiket.numeric' => 'Harga Tiket harus angka',
    ]);

    // Ambil data berdasarkan ID
    $wisata = Admin::findOrFail($id);

    // Handle update logic
    $wisata->update([
        'nama_wisata' => $request->nama_wisata,
        'lokasi_wisata' => $request->lokasi_wisata,
        'desc_wisata' => $request->desc_wisata,
        'jumlah_tiket' => $request->jumlah_tiket,
        'harga_tiket' => $request->harga_tiket,
    ]);

    // Jika ada gambar yang diunggah, proses gambar
    if ($request->hasFile('img_wisata')) {
        $file = $request->file('img_wisata');
        $fileName = $file->hashName();
        $file->storeAs('public/img', $fileName);

        // Update kolom img_wisata dengan nama file yang baru
        $wisata->update(['img_wisata' => $fileName]);
    }

    return redirect()->route('admin.wisata')->with('success', 'Berhasil Mengupdate Data');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // HAPUS DATA WISATA
        $wisata = Admin::findOrFail($id);
        $wisata->delete();

        return redirect()->route('admin.wisata')->with('success', 'Berhasil Menghapus Data');
    }
}
