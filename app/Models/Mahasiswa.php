<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama',
    ];

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'kriteria_mahasiswa', 'mahasiswa_id', 'kriteria_id')->withPivot('nilai');
    }
}
