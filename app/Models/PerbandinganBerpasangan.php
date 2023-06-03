<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganBerpasangan extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_berpasangan';
    protected $fillable = ['kriteria1_id', 'kriteria2_id', 'nilai','riwayat_perhitungan_id'];
}
