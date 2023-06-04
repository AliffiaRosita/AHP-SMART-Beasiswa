<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Models\Rangking;
use App\Models\RiwayatPerhitungan;
use App\Models\PerbandinganBerpasangan;
use App\Models\HasilBobot;

class PerhitunganController extends Controller
{
    public function hitungbobot(Request $request)
    {
        $jumlahkriteria = Kriteria::count();
        $kriteria = Kriteria::all();

        $riwayatPerhitungan = RiwayatPerhitungan::create();

        $matrikskriteria = [];
        $urut = 0;
        for ($x = 0; $x <= ($jumlahkriteria - 2); $x++) {
            for ($y = $x + 1; $y <= ($jumlahkriteria - 1); $y++) {
                $urut++;
                $pilihan = $request->pilihan[$urut];
                $bobot = $request->bobot[$urut];
                if ($pilihan == 1) {
                    $matrikskriteria[$x][$y] = $bobot;
                    $matrikskriteria[$y][$x] = round(1 / $bobot, 7, PHP_ROUND_HALF_UP);
                } else {
                    $matrikskriteria[$x][$y] = round(1 / $bobot, 7, PHP_ROUND_HALF_UP);
                    $matrikskriteria[$y][$x] = $bobot;
                }

                PerbandinganBerpasangan::updateOrCreate(
                    [
                        'kriteria1_id' => $kriteria[$x]->id,
                        'kriteria2_id' => $kriteria[$y]->id,
                        'riwayat_perhitungan_id' => $riwayatPerhitungan->id,
                    ],
                    [

                        'nilai' => $matrikskriteria[$x][$y],
                    ]
                );
            }
        }


        for ($i = 0; $i <= ($jumlahkriteria - 1); $i++) {
            $matrikskriteria[$i][$i] = 1;
        }

        //inisialisasi jumlah tiap kolom dan baris kriteria
        // jumlah perbaris
        $jmlpb = [];
        // jumlah perkolom
        $jmlpk = [];

        for ($i = 0; $i <= ($jumlahkriteria - 1); $i++) {
            $jmlpb[$i] = 0;
            $jmlpk[$i] = 0;
        }

        for ($x = 0; $x <= ($jumlahkriteria - 1); $x++) {
            for ($y = 0; $y <= ($jumlahkriteria - 1); $y++) {
                $nilai = $matrikskriteria[$x][$y];
                $jmlpk[$x] += $nilai;
            }
        }

        //menghitung jumlah pada baris matrik yang telah dinormalisasi
        for ($x = 0; $x <= ($jumlahkriteria - 1); $x++) {
            for ($y = 0; $y <= ($jumlahkriteria - 1); $y++) {
                $matrikskriterianormal[$x][$y] = round($matrikskriteria[$x][$y] / $jmlpk[$x], 7, PHP_ROUND_HALF_UP);
                $nilai = $matrikskriterianormal[$x][$y];
                // $jmlpb[$y] += $nilai;
            }
            // $priorityVector[$x] = round($jmlpb[$x]/$jumlahkriteria,7,PHP_ROUND_HALF_UP) ;
            // PvectorCtriteria::updateOrCreate(
            //     ['user_id'=> 1 ,'criteria_id' => $kriteria[$x]->id],
            //     ['nilai'=>$priorityVector[$x]]
            // );
        }
        // priority vector atau jumlah perbaris
        for ($i = 0; $i <= ($jumlahkriteria - 1); $i++) {
            for ($j = 0; $j <= ($jumlahkriteria - 1); $j++) {
                $jmlpb[$i] += $matrikskriterianormal[$j][$i];
            }
        }

        // perulanagan menghitung bobot (pvector/jumlahkriteria)
        for ($i = 0; $i <= ($jumlahkriteria - 1); $i++) {
            $bobotKriteria[$i] = round(($jmlpb[$i] / $jumlahkriteria), 7, PHP_ROUND_HALF_UP);
            $eigenvalue[$i] = round(($bobotKriteria[$i] * $jmlpk[$i]), 7, PHP_ROUND_HALF_UP);
            HasilBobot::updateOrCreate(
                ['riwayat_perhitungan_id' => $riwayatPerhitungan->id, 'kriteria_id' => $kriteria[$i]->id],
                ['nilai' => $bobotKriteria[$i]]
            );
        }

        $consistencyIndex = round((array_sum($eigenvalue) - $jumlahkriteria) / ($jumlahkriteria - 1), 7, PHP_ROUND_HALF_UP);
        $RiValue = 0.9;

        $consistencyRatio = round($consistencyIndex / $RiValue, 7, PHP_ROUND_HALF_UP);
        if ($consistencyRatio > 0.1) {
            $riwayatPerhitungan->delete();
        }
        // dd([
        //     'kriterias'=>$kriteria,
        //     'jumlahkriteria'=>$jumlahkriteria,
        //     'matrikskriteria'=>$matrikskriteria,
        //     'jmlpb'=>$jmlpb,
        //     'matrikskriterianormal'=>$matrikskriterianormal,
        //     'jmlpk'=>$jmlpk,
        //     'bobotKriteria'=>$bobotKriteria,
        //     'eigenvalue'=>$eigenvalue,
        //     'consistencyIndex'=>round($consistencyIndex,7,PHP_ROUND_HALF_UP),
        //     'consistencyRatio'=>round($consistencyRatio,7,PHP_ROUND_HALF_UP)

        // ]);
        return view(
            'analisa.hasilkriteria',
            [
                'kriterias' => $kriteria,
                'jumlahkriteria' => $jumlahkriteria,
                'matrikskriteria' => $matrikskriteria,
                'jmlpb' => $jmlpb,
                'matrikskriterianormal' => $matrikskriterianormal,
                'jmlpk' => $jmlpk,
                'eigenvalue' => $eigenvalue,
                'consistencyIndex' => $consistencyIndex,
                'consistencyRatio' => $consistencyRatio,
                'RiValue' => $RiValue,
                'bobotKriteria' => $bobotKriteria,
                'riwayatPerhitungan' => $riwayatPerhitungan,
            ]
        );
    }

    public function rangking($riwayatPerhitunganId)
    {

        // PERHITUNGAN S-M-A-R-T
        $jumlahkriteria = Kriteria::count();
        $kriteria = Kriteria::all();
        // $riwayatPerhitungan = RiwayatPerhitungan::findOrFail($riwayatPerhitunganId);
        $hasilBobot = HasilBobot::where('riwayat_perhitungan_id', $riwayatPerhitunganId)->get();

        // 1. Mencari nilai minimum dan nilai maksimum masing-masing kriteria
        for ($i = 1; $i <= $jumlahkriteria; $i++) {
            $nilaiMin[] = DB::table('kriteria_mahasiswa')->where('kriteria_id', $i)->min('nilai');
            $nilaiMax[] = DB::table('kriteria_mahasiswa')->where('kriteria_id', $i)->max('nilai');
        }

        // 2. Ambil semua alternatif mahasiswa beserta nilai kriterianya
        $semuaMahasiswa = Mahasiswa::with('kriteria')->get();


        return view('analisa.hasilrangking', [
            'kriterias' => $kriteria,
            'semuaMahasiswa' => $semuaMahasiswa,
        ]);
        // dd([$nilaiMin,$nilaiMax,$semuaMahasiswa[0]->kriteria,$tabelUtility,$tabelNilaiAkhir,$hasil,$rangkings]);
    }
}
