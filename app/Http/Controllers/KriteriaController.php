<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $allKriteria = Kriteria::all();
        return view('kriteria.index',[
            'allKriteria'=>$allKriteria
        ]);
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit',['kriteria'=>$kriteria]);
    }

    public function update(Request $request,$id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update([
            'nama'=>$request->nama,
            'kategori'=>$request->kategori,
        ]);
        return view('kriteria.index')->with('status','Data periode berhasil diubah');
    }
}
