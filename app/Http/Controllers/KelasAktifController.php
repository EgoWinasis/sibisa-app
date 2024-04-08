<?php

namespace App\Http\Controllers;

use App\Models\ModelSettingDataSiswa;
use App\Models\ModelSettingSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\Students;
use Illuminate\Http\Request;

class KelasAktifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunAjaran = ModelTahunAjaran::where('status', 1)->first();
        $kelas = ModelSettingSiswa::where('id_tahun_ajaran', $tahunAjaran->id)->get();
        $jumlahSiswaArray = [];
        $index = 1;

        for ($i = 1; $i <= 7; $i++) {
            $jumlahSiswaArray[$i] = 0;
        }
        foreach ($kelas as $k) {
            $jumlahSiswa = ModelSettingDataSiswa::where('id_setting_siswa', $k->id)->count();
            $jumlahSiswaArray[$index] += $jumlahSiswa;
            $index++;
        }
        return view('kelas.kelas_view')->with(compact('kelas', 'jumlahSiswaArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas =  ModelSettingSiswa::where('id', $id)->first();
        $settingDataSiswa = ModelSettingDataSiswa::where('id_setting_siswa', $id)->get();
        $idStudents = $settingDataSiswa->pluck('id_student')->toArray();
        $siswa = Students::whereIn('id', $idStudents)->get();
        return view('kelas.kelas_detail_view')->with(compact('siswa','kelas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
