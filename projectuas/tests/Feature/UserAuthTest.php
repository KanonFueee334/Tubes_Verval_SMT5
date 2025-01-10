<?php

namespace Tests\Feature;
use Tests\TestCase;

class UserAuthTest extends TestCase
{

    public function testSuperadminLogin()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'superadmin',
            'password' => 'superadmin123',
        ]);

        $response->assertRedirect(route('super_admin.dashboard'));
        $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'superadmin')->first());
    }

    public function testAdminLogin()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'admin',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin'));
        $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'admin')->first());
    }

    public function testGudangLogin()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'gudang',
            'password' => 'gudang123',
        ]);

        $response->assertRedirect(route('gudang.dashboard'));
        $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'gudang')->first());
    }

    public function testAddSupplier()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'superadmin',
            'password' => 'superadmin123',
        ]);

        $response->assertRedirect(route('super_admin.dashboard'));

        $response = $this->post('/super_admin/supplier/tambah', [
            'nama_supplier' => 'Budi',
            'alamat_supplier' => 'Jl. Jalan No. 1',
            'email_supplier' => 'budi@example.com',
            'telp_supplier' => '081234567890',
        ]);

        $response->assertRedirect(route('super_admin.supplier'));
        $this->assertEquals('Supplier berhasil ditambahkan.', session('success'));
    }

    public function testAddKategori()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'superadmin',
            'password' => 'superadmin123',
        ]);

        $response->assertRedirect(route('super_admin.dashboard'));

        $response = $this->post('/super_admin/kategori/tambah', [
            'nama_kategori' => 'Budi',
        ]);

        $response->assertRedirect(route('super_admin.kategori'));
        $this->assertEquals('Kategori berhasil ditambahkan.', session('success'));
    }

    public function testAddBarang()
    {
        $response = $this->post('/login', [
            'nama_pengguna' => 'superadmin',
            'password' => 'superadmin123',
        ]);

        $response->assertRedirect(route('super_admin.dashboard'));

        $response = $this->post('/super_admin/barang/tambah', [
            'id_kategori' => 1, // Assuming category ID 1 exists
            'id_supplier' => 1, // Assuming supplier ID 1 exists
            'nama_barang' => 'Budi',
        ]);

        $response->assertRedirect(route('super_admin.barang'));
        $this->assertEquals('Barang berhasil ditambahkan.', session('success'));
    }
}
