<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Models\Rangking;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahkriteria = Kriteria::count();
        $kriteria = Kriteria::all();
        $urut = 0;
        return view('dashboard',['jumlahkriteria'=>$jumlahkriteria,'kriteria'=>$kriteria,'urut'=>$urut,]);
    }

}
