<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\Stok;
use App\Models\TransaksiHeader;

class AdminGudangTest extends TestCase
{
  // Tambah Customer oleh admin
  public function test_admin_can_add_customer()
  {
    $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'admin123',
    ]);

    $response = $this->post('/admin/customer/tambah', [
      'nama_customer' => 'Ferry Oktariansyah',
      'alamat_customer' => 'Benowo, Surabaya',
      'email_customer' => 'ferryokt24@example.com',
      'telp_customer' => '085233675567',
    ]);

    $response->assertRedirect(route('admin.customer'));
    $this->assertEquals('Customer berhasil ditambahkan.', session('success'));
  }

  // Ubah Supplier oleh admin
  public function test_admin_can_edit_customer()
  {
    $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'admin123',
    ]);

    $response = $this->put('/admin/customer/ubah/1', [
      'nama_customer' => 'Gerrard Sebastian',
      'alamat_customer' => 'Benowo, Surabaya',
      'email_customer' => 'ferryokt24@example.com',
      'telp_customer' => '085233675567',
    ]);

    $response->assertRedirect(route('admin.customer'));
    $this->assertEquals('Data customer berhasil diperbarui.', session('success'));
  }

  // Buat Transaksi oleh admin
  public function test_admin_can_create_transaksi()
  {
    $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'admin123',
    ]);

    $customer = Customer::factory()->create();
    $stok = Stok::factory()->count(2)->create();

    $response = $this->post('/admin/transaksi/tambah', [
      'customer' => $customer->id_customer,
      'totalSubtotal' => 500000,
      'pesanan' => [
        [
          'id_stok' => $stok[0]->id_stok,
          'qty' => 2,
          'subtotal' => 200000,
        ],
        [
          'id_stok' => $stok[1]->id_stok,
          'qty' => 3,
          'subtotal' => 300000,
        ],
      ],
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('temp_transaksi_header', [
      'id_customer' => $customer->id_customer,
      'total_transaksi' => 500000,
    ]);

    $this->assertDatabaseCount('temp_transaksi_detail', 2);
  }

  // Konfirmasi Pesanan oleh Gudang
  public function test_gudang_can_confirm_order()
  {
    $this->post('/login', [
      'nama_pengguna' => 'gudang',
      'password' => 'gudang123',
    ]);

    $customer = Customer::factory()->create();

    $transaksi = TransaksiHeader::factory()->create([
      'id_customer' => $customer->id_customer,
      'tanggal_transaksi' => now(),
      'total_transaksi' => 100000,
      'status_transaksi' => 1,
    ]);

    $response = $this->post('/gudang/transaksi/konfirmasi/' . $transaksi->id_transaksi_header);

    $response->assertStatus(200);

    $this->assertDatabaseHas('transaksi_header', [
      'id_transaksi_header' => $transaksi->id_transaksi_header,
      'status_transaksi' => 2,
    ]);
  }
}
