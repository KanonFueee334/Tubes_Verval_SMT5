<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserAuthTest extends TestCase
{
  // Login Superadmin
  public function testSuperadminLogin()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'superadmin',
      'password' => 'superadmin123',
    ]);

    $response->assertRedirect(route('super_admin.dashboard'));
    $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'superadmin')->first());
  }
  // Login Admin
  public function testAdminLogin()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'admin123',
    ]);

    $response->assertRedirect(route('admin'));
    $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'admin')->first());
  }
  // Login Gudang
  public function testGudangLogin()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'gudang',
      'password' => 'gudang123',
    ]);

    $response->assertRedirect(route('gudang.dashboard'));
    $this->assertAuthenticatedAs(\App\Models\Pengguna::where('nama_pengguna', 'gudang')->first());
  }

  // Login validation
  public function testLoginGagal()
  {
    $response = $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'salah',
    ]);

    $response->assertSessionHas('error', 'Nama pengguna atau kata sandi salah');
  }

  // Logout
  public function testLogout()
  {
    $this->post('/login', [
      'nama_pengguna' => 'admin',
      'password' => 'admin123',
    ]);

    $response = $this->post('/logout');

    $response->assertRedirect('/login');
  }
}
