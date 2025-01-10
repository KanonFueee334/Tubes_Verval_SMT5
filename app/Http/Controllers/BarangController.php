<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

use App\Models\Hkranjangs;
use App\Models\Dkranjangs;
use App\Models\Kategori;
use App\Models\Supplier;

class BarangController extends Controller
{
    // menampilkan
    public function index()
    {
        $barang = Barang::all();
        return view('super_admin.barang.list')->with('barang', $barang);
    }

    // tambah
    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('super_admin.barang.tambah_barang', [
            'kategori' => $kategori,
            'supplier' => $supplier,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_supplier' => 'required|exists:supplier,id_supplier',
            'nama_barang' => 'required|string|max:255',
        ], [
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.exists' => 'Kategori tidak valid.',
            'id_supplier.required' => 'Supplier wajib dipilih.',
            'id_supplier.exists' => 'Supplier tidak valid.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string' => 'Nama barang harus berupa teks.',
        ]);

        Barang::create([
            'id_kategori' => $request->id_kategori,
            'id_supplier' => $request->id_supplier,
            'nama_barang' => $request->nama_barang,
        ]);

        return redirect()->route('super_admin.barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    // ubah
    public function edit($id)
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        $barang = Barang::findOrFail($id);
        return view('super_admin.barang.ubah_barang', [
            'barang' => $barang,
            'kategori' => $kategori,
            'supplier' => $supplier,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_supplier' => 'required|exists:supplier,id_supplier',
            'nama_barang' => 'required|string|max:255',
        ], [
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.exists' => 'Kategori tidak valid.',
            'id_supplier.required' => 'Supplier wajib dipilih.',
            'id_supplier.exists' => 'Supplier tidak valid.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string' => 'Nama barang harus berupa teks.',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('super_admin.barang')->with('success', 'Data barang berhasil diperbarui.');
    }

    // soft delete
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->update(
            ['status' => 0]
        );

        return redirect()->route('super_admin.barang')->with('success', 'Barang berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $barang = Barang::find($id);
        $barang->update(
            ['status' => 1]
        );

        return redirect()->route('super_admin.barang')->with('success', 'Barang berhasil di aktifkan.');
    }
}
