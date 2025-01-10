<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait, Notifiable;

    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama_pengguna',
        'password',
        'saldo',
        'role',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    // public function getRoleAttribute()
    // {
    //     return $this->attributes('role');
    // }

    public $timestamps = false;
}
