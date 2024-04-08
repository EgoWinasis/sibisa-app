<?php

namespace App\Http\Controllers;

use App\Models\ModelSettingGuru;
use App\Models\ModelTahunAjaran;
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
        $siswa = DB::table('students')->count();
        $kelas = DB::table('class')->groupBy('kelas')->get();
        $nilai = DB::table('ketidakhadiran')->count();
        $file = DB::table('ijazah')->count();
        $tahunAjaran = ModelTahunAjaran::where('status', 1)->get();
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
      
        if (Auth::user()->role == 'admin') {
            # code...
            return view('home')
                ->with(compact('siswa', 'kelas', 'nilai', 'file', 'tahunAjaran', 'nama'));
        } else {
            return view('home_guru')
                ->with(compact('siswa', 'kelas', 'nilai', 'file', 'tahunAjaran', 'nama', 'gurukelas'));
        }
    }
}
