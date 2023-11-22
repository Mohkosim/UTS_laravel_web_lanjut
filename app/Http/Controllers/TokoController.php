<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $tokos = Toko::get();
        return view('admins.producpage', compact('tokos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admins.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_bunga' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric |regex:/^\d{1,5}(\.\d{1,2})?$/',
            'description' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload and storage
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar', $imageName, 'public');
        } else {
            $imageName = null; // No image upload
        }

        Toko::create([
            'nama_bunga' => $request->nama_bunga,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'description' => $request->description,
            'gambar' => $imageName, // Store image file name in the database
        ]);

        return redirect()->route('producpage')->with(['success' => 'Data Berhasil Diperbaharui!']);
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
    public function edit(string $id): view
    {
        $tokos = Toko::findOrFail($id);
        return view('admins.edit', compact('tokos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_bunga' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'description' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $toko = Toko::findOrFail($id);

        // Handle image upload and storage if a new image is selected
        if ($request->hasFile('gambar')) {
            if ($toko->gambar) {
                Storage::delete('public/gambar/' . $toko->gambar);
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar', $imageName, 'public');

            $toko->gambar = $imageName;
        }

        $toko->update([
            'nama_bunga' => $request->nama_bunga,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'description' => $request->description,
        ]);

        return redirect()->route('producpage')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tokos = Toko::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($tokos->gambar) {
            Storage::delete('public/gambar/' . $tokos->gambar);
        }

        $tokos->delete();

        return redirect()->route('producpage')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
