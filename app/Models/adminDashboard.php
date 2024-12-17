<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminDashboard extends Model
{
    // Jika tabelnya bukan "admin_dashboards", definisikan nama tabelnya:
    // protected $table = 'nama_tabel';

    // Model ini biasanya tidak perlu menyimpan data, jadi disable timestamps
    public $timestamps = false;

    /**
     * Dapatkan total postingan dari tabel items.
     */
    public static function getTotalPostingan()
    {
        return Item::count();
    }

    /**
     * Dapatkan total pengguna dengan role tertentu.
     *
     * @param string $role
     * @return int
     */
    public static function getTotalPenggunaByRole($role = 'user')
    {
        return User::where('role', $role)->count();
    }

    /**
     * Dapatkan total transaksi (bisa sama dengan total postingan dalam kasus ini).
     */
    public static function getTotalTransaksi()
    {
        return self::getTotalPostingan();
    }
}
