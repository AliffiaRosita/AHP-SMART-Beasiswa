<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

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
