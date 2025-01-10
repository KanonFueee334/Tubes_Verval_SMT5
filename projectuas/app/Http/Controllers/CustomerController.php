<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer.list', [
            'customer' => $customer
        ]);
    }

    // tambah
    public function create()
    {
        return view('admin.customer.tambah_customer');
    }

    public function store(Request $request)
    {
        // Menambahkan validasi
        $request->validate([
            'nama_customer' => 'required|string',
            'alamat_customer' => 'required|string',
            'email_customer' => 'required|email',
            'telp_customer' => 'required|numeric',
        ], [
            'nama_customer.required' => 'Nama customer wajib diisi.',
            'alamat_customer.required' => 'Alamat customer wajib diisi.',
            'email_customer.required' => 'Email customer wajib diisi.',
            'email_customer.email' => 'Masukkan email yang benar.',
            'telp_customer.required' => 'Telepon customer wajib diisi.',
            'telp_customer.numeric' => 'Masukkan no telepon yang benar.',
        ]);

        // Menyimpan customer jika validasi berhasil
        Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect()->route('admin.customer')->with('success', 'Customer berhasil ditambahkan.');
    }

    // ubah
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.ubah_customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_customer' => 'required|string',
            'alamat_customer' => 'required|string',
            'email_customer' => 'required|email',
            'telp_customer' => 'required|numeric',
        ], [
            'nama_customer.required' => 'Nama customer wajib diisi.',
            'alamat_customer.required' => 'Alamat customer wajib diisi.',
            'email_customer.required' => 'Email customer wajib diisi.',
            'email_customer.email' => 'Masukkan email yang benar.',
            'telp_customer.required' => 'Telepon customer wajib diisi.',
            'telp_customer.numeric' => 'Masukkan nomor telepon yang benar (hanya angka).',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect()->route('admin.customer')->with('success', 'Data customer berhasil diperbarui.');
    }

    // soft delete
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->update(
            ['status_customer' => 0]
        );

        return redirect()->back()->with('success', 'Barang berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $customer = Customer::find($id);
        $customer->update(
            ['status_customer' => 1]
        );

        return redirect()->back()->with('success', 'Barang berhasil di aktifkan.');
    }
}
