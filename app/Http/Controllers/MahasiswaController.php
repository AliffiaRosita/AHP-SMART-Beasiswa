<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMahasiswa = Mahasiswa::all();
        return view('mahasiswa.index',['allMahasiswa'=>$allMahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'ipk'=>'required',
            'total_penghasilan_orang_tua'=>'required',
            'jumlah_anggota_keluarga'=>'required',
            'semester'=>'required',
        ]);
        $mahasiswa = Mahasiswa::create([
            'nama'=>$request->nama,
        ]);
        $value =[
            1=>['nilai'=>$request->ipk],
            2=>['nilai'=>$request->total_penghasilan_orang_tua],
            3=>['nilai'=>$request->jumlah_anggota_keluarga],
            4=>['nilai'=>$request->semester],
        ];
        $mahasiswa->kriteria()->attach($value);
        return redirect()->route('mahasiswa.index')->with('status','Berhasil menambahkan mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail',['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit',['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nama'=>'required',
            'ipk'=>'required',
            'total_penghasilan_orang_tua'=>'required',
            'jumlah_anggota_keluarga'=>'required',
            'semester'=>'required',
        ]);
        $mahasiswa->update([
            'nama'=>$request->nama,
        ]);
        $value =[
            1=>['nilai'=>$request->ipk],
            2=>['nilai'=>$request->total_penghasilan_orang_tua],
            3=>['nilai'=>$request->jumlah_anggota_keluarga],
            4=>['nilai'=>$request->semester],
        ];
        $mahasiswa->kriteria()->sync($value);
        return redirect()->route('mahasiswa.index')->with('status','Berhasil mengubah mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('status','Mahasiswa Berhasil dihapus');
    }
}
