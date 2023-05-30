<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = [
        'nama',
        'kategori',
    ];

    public function mahasiwa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'kriteria_mahasiswa', 'mahasiswa_id', 'kriteria_id')->withPivot('nilai');
    }
}
