<?php

namespace App\Http\Controllers;

use App\Models\ModelSettingGuru;
use App\Models\ModelSettingSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaAktifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role !== 'guru') {
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
        $tahunAjaran = ModelTahunAjaran::where('status', 1)->get();
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

        $settingSiswa = ModelSettingSiswa::where('id_tahun_ajaran', $tahunAjaran->first()->id)
            ->where('kelas', $gurukelas)
            ->first();
        $students = Students::whereIn('id', function ($query) use ($settingSiswa) {
            $query->select('id_student')
                ->from('setting_data_siswa')
                ->where('id_setting_siswa', $settingSiswa->id);
        })->get();
        return view('siswa.siswa_aktif_view')
            ->with(compact('students','gurukelas'));
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
        //
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
