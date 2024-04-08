<?php

namespace App\Http\Controllers;

use App\Models\ModelSettingDataSiswa;
use App\Models\ModelSettingGuru;
use App\Models\ModelSettingSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\PelajarPancasila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isActive == 0) {
            Auth::logout();
            return redirect()->route('login')->with('error-active', 'Your account is inactive. Please contact Admin support.');
        }
        $tahunAjaran = ModelTahunAjaran::where('status', 1)->first();
        $countAllSiswa = DB::table('students')->count();
        $nama = Auth::user()->name;
        $guru = ModelSettingGuru::where('id_tahun_ajaran', $tahunAjaran->first()->id)->get();
        $user_id = Auth::id();
        $found_in_columns = 0;
        $gurukelas = 0;
        foreach ($guru as $row) {
            $columns = [
                'id_guru1',
                'id_guru2',
                'id_guru3',
                'id_guru4',
                'id_guru5',
                'id_guru6',
            ];

            foreach ($columns as $column) {
                if ($row->$column == $user_id) {
                    $found_in_columns = $column;
                    break; // Exit the inner loop once the user ID is found in a column
                }
            }
        }
        switch ($found_in_columns) {
            case 'id_guru1':
                $gurukelas = 1;
                break;
            case 'id_guru2':
                $gurukelas = 2;
                break;
            case 'id_guru3':
                $gurukelas = 3;
                break;
            case 'id_guru4':
                $gurukelas = 4;
                break;
            case 'id_guru5':
                $gurukelas = 5;
                break;
            case 'id_guru6':
                $gurukelas = 6;
                break;

            default:
                # code...
                break;
        }
        if (Auth::user()->role != 'admin') {
            $settingSiswa = ModelSettingSiswa::where('id_tahun_ajaran', $tahunAjaran->id)
                ->where('kelas', $gurukelas)->first();
            $countSiswa = ModelSettingDataSiswa::where('id_setting_siswa', $settingSiswa->id)->count();
            $countNilai = PelajarPancasila::where('tahun_ajaran', $tahunAjaran->tahun_ajaran)
                ->where('kelas', $gurukelas)
                ->count();
        }


        if (Auth::user()->role == 'admin') {
            // get lulus 
            $settingSiswa = ModelSettingSiswa::where('kelas', 7)->get();
            $countSiswaLulus = 0;

            foreach ($settingSiswa as $siswa) {
                $count = ModelSettingDataSiswa::where('id_setting_siswa', $siswa->id)->count();
                $countSiswaLulus += $count;
            }

            // guru
            $countGuru = DB::table('users')->where('deleted_at', NULL)->count();

            return view('home')
                ->with(compact('countAllSiswa','countSiswaLulus',  'countGuru',  'tahunAjaran', 'nama'));
        } else {
            return view('home_guru')
                ->with(compact('countSiswa',  'countNilai', 'tahunAjaran', 'nama', 'gurukelas'));
        }
    }
}
