<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBobot extends Model
{
    use HasFactory;
    protected $table = 'hasil_bobot';
    protected $fillable = ['kriteria_id', 'nilai','riwayat_perhitungan_id'];
}
