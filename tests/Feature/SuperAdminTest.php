<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\Purchasing_Order_Header;

class SuperAdminTest extends TestCase
{
  // MENU SUPPLIER
  // Lihat Halaman Order
  public function test_can_view_supplier_order_page_()
  {
    $supplierId = 1;

    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->get(route('super_admin.supplier.order', ['id_supplier' => $supplierId]));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.supplier.list_barang');
    $response->assertViewHas('barang');
  }

  // Tambah Supplier
  public function test_can_add_Supplier()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->post('/super_admin/supplier/tambah', [
      'nama_supplier' => 'CV. Indo Jaya Makmur',
      'alamat_supplier' => 'Wonokromo, Surabaya',
      'email_supplier' => 'indojaya20@example.com',
      'telp_supplier' => '081234567890',
    ]);

    $response->assertRedirect(route('super_admin.supplier'));
    $this->assertEquals('Supplier berhasil ditambahkan.', session('success'));
  }

  // Ubah Supplier
  public function test_can_edit_supplier()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->put('/super_admin/supplier/ubah/1', [
      'nama_supplier' => 'PT. Platinum Ceramics Industry',
      'alamat_supplier' => 'Jl. Jalan Ketintang Selatan No 7',
      'email_supplier' => 'platinumceramic19@example.com',
      'telp_supplier' => '081235145524',
    ]);

    $response->assertRedirect(route('super_admin.supplier'));
    $this->assertEquals('Data supplier berhasil diperbarui.', session('success'));
  }

  // Hapus/Nonatifkan Supplier
  public function test_can_delete_supplier()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->delete('/super_admin/supplier/hapus/2');
    $response->assertRedirect();
    $this->assertEquals('Barang berhasil di non aktifkan.', session('success'));
  }

  // Restore/Aktifkan Supplier
  public function test_can_activated_supplier()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->patch('/super_admin/supplier/hapus/2');
    $response->assertRedirect();
    $this->assertEquals('Barang berhasil di aktifkan.', session('success'));
  }

  // MENU KATEGORI
  // Tambah Kategori
  public function test_can_add_kategori()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->post('/super_admin/kategori/tambah', [
      'nama_kategori' => 'Cat',
    ]);

    $response->assertRedirect(route('super_admin.kategori'));
    $this->assertEquals('Kategori berhasil ditambahkan.', session('success'));
  }

  // Ubah Kategori
  public function test_can_edit_kategori()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->put('/super_admin/kategori/ubah/1', [
      'nama_kategori' => 'Paku',
    ]);

    $response->assertRedirect(route('super_admin.kategori'));
    $this->assertEquals('Data kategori berhasil diperbarui.', session('success'));
  }

  // Hapus/Nonatifkan Supplier
  public function test_can_delete_kategori()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->delete('/super_admin/kategori/hapus/2');
    $response->assertRedirect();
    $this->assertEquals('Kategori berhasil di non aktifkan.', session('success'));
  }

  // Restore/Aktifkan Supplier
  public function test_can_activated_kategori()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->patch('/super_admin/kategori/hapus/2');
    $response->assertRedirect();
    $this->assertEquals('Kategori berhasil di aktifkan.', session('success'));
  }

  // MENU BARANG
  // Tambah Barang
  public function test_can_add_barang()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->post('/super_admin/barang/tambah', [
      'id_kategori' => 1,
      'id_supplier' => 1,
      'nama_barang' => 'Pool Grey 01 50x50',
    ]);

    $response->assertRedirect(route('super_admin.barang'));
    $this->assertEquals('Barang berhasil ditambahkan.', session('success'));
  }

  // Ubah Barang
  public function test_can_edit_barang()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->put('/super_admin/barang/ubah/1', [
      'id_kategori' => 1,
      'id_supplier' => 1,
      'nama_barang' => 'Azuvi SOKLAT 40x40',
    ]);

    $response->assertRedirect(route('super_admin.barang'));
    $this->assertEquals('Data barang berhasil diperbarui.', session('success'));
  }

  // Hapus/Nonatifkan Barang
  public function test_can_delete_barang()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->delete('/super_admin/barang/hapus/2');
    $response->assertRedirect();
    $this->assertEquals('Barang berhasil di non aktifkan.', session('success'));
  }

  // Restore/Aktifkan Barang
  public function test_can_activated_barang()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->patch('/super_admin/barang/restore/2');
    $response->assertRedirect();
    $this->assertEquals('Barang berhasil di aktifkan.', session('success'));
  }

  // MENU PURCHASING ORDER
  // Cek Order Supplier
  public function test_can_access_purchasing_order_history()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->get(route('super_admin.po'));

    $response->assertStatus(200);

    $response->assertViewIs('super_admin.purchase_order.list');
    $response->assertViewHas('order', Purchasing_Order_Header::all());
  }

  // MENU STOK DAN HARGA
  //Cek Stok dan Harga Barang
  public function test_can_view_stok_list()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));

    $response = $this->get(route('super_admin.stok'));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.stok.list');
    $response->assertViewHas('stok');
  }

  // MENU LAPORAN
  // Cek Laporan Harian
  public function test_can_view_laporan_penjualan_harian()
  {
    $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response = $this->get(route('report.harian'));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.reports.harian');
    $response->assertViewHasAll(['laporan', 'totalPenjualan', 'totalHpp', 'totalUntung', 'tanggal']);
  }

  // Cek Laporan laba rugi bulanan
  public function test_can_access_laba_rugi_bulanan()
  {
    $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response = $this->get(route('report.bulanan', ['bulan' => 12, 'tahun' => 2024]));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.reports.bulanan');
    $response->assertViewHasAll(['bulan', 'tahun', 'totalOmzetPenjualan', 'totalHPP', 'labaKotor', 'totalBiayaOperasional', 'labaBersih']);
  }

  // Cek Laporan Neraca
  public function test_can_access_laporan_neraca()
  {
    $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response = $this->get(route('report.neracaBulanan', ['bulan' => 12, 'tahun' => 2024]));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.reports.neraca_bulanan');
    $response->assertViewHasAll(['bulan', 'tahun', 'neraca', 'totalDebet', 'totalKredit']);
  }

  // Cek Laporan Barang Keluar Masuk
  public function test_can_access_pemasukan_pengeluaran_barang()
  {
    $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response = $this->get(route('report.pemasukan_pengeluaran_barang', ['bulan' => 12, 'tahun' => 2024]));

    $response->assertStatus(200);
    $response->assertViewIs('super_admin.reports.barang');
    $response->assertViewHasAll(['laporanStok', 'bulan', 'tahun']);
  }
}
