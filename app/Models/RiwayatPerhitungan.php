<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerhitungan extends Model
{
    use HasFactory;
    protected $table = "riwayat_perhitungan";

    public function rangking()
    {
        return $this->hasMany(Rangking::class);
    }
    public function perbandingan_berpasangan()
    {
        return $this->hasMany(PerbandinganBerpasangan::class);
    }
    public function hasilBobot()
    {
        return $this->hasMany(HasilBobot::class);
    }
}
