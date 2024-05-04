<?php

namespace App\Http\Controllers;

use App\Models\ModelPresensi;
use App\Models\ModelSettingGuru;
use App\Models\ModelSettingSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrensensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tahunAjaran = ModelTahunAjaran::where('status', 1)->first();
        if (auth()->check() && auth()->user()->role !== 'admin') {
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

            $students = Students::select(
                'students.id',
                'students.nis',
                'students.nama_lengkap',
                DB::raw('COUNT(CASE WHEN presensi.status = "Hadir" THEN 1 ELSE NULL END) as hadir'),
                DB::raw('COUNT(CASE WHEN presensi.status = "Izin" THEN 1 ELSE NULL END) as izin'),
                DB::raw('COUNT(CASE WHEN presensi.status = "Sakit" THEN 1 ELSE NULL END) as sakit'),
                DB::raw('COUNT(CASE WHEN presensi.status = "Tanpa keterangan" THEN 1 ELSE NULL END) as tanpa_keterangan')
            )
                ->leftJoin('presensi', 'students.id', '=', 'presensi.id_siswa')
                ->whereIn('students.id', function ($query) use ($settingSiswa) {
                    $query->select('id_student')
                        ->from('setting_data_siswa')
                        ->where('id_setting_siswa', $settingSiswa->id);
                })
                ->where('students.angkatan', '=', $tahunAjaran->tahun_ajaran)
                ->where('students.status', '=', 'Aktif')
                ->groupBy('students.id', 'students.nis', 'students.nama_lengkap')
                ->orderBy('students.nis')
                ->get();

            
        } else {
            $tahunAjaran = DB::table('tahun_ajaran')
                ->select('tahun_ajaran', 'status')
                ->orderBy('tahun_ajaran')
                ->get();
            $tahunAjaranAktif = DB::table('tahun_ajaran')
                ->select('tahun_ajaran')
                ->where('status', '=', 1)
                ->first();
            $tahunAjaranAktif = $tahunAjaranAktif->tahun_ajaran;

            $students = DB::table('students')
                ->select(
                    'students.id',
                    'students.nis',
                    'students.nama_lengkap',
                    DB::raw('COUNT(CASE WHEN presensi.status = "Hadir" THEN 1 ELSE NULL END) as hadir'),
                    DB::raw('COUNT(CASE WHEN presensi.status = "Izin" THEN 1 ELSE NULL END) as izin'),
                    DB::raw('COUNT(CASE WHEN presensi.status = "Sakit" THEN 1 ELSE NULL END) as sakit'),
                    DB::raw('COUNT(CASE WHEN presensi.status = "Tanpa keterangan" THEN 1 ELSE NULL END) as tanpa_keterangan')
                )
                ->leftJoin('presensi', 'students.id', '=', 'presensi.id_siswa')
                ->where('students.angkatan', '=', $tahunAjaranAktif)
                ->where('students.status', '=', 'Aktif')
                ->groupBy('students.id', 'students.nis', 'students.nama_lengkap')
                ->orderBy('students.nis')
                ->get();
        }

        return view('presensi.presensi_view')
            ->with(compact('students', 'tahunAjaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahunAjaran = ModelTahunAjaran::where('status', 1)->first();
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

        $students = Students::select('students.id', 'students.nama_lengkap', 'students.nis', 'presensi.status')
            ->join('setting_data_siswa', 'students.id', '=', 'setting_data_siswa.id_student')
            ->join('presensi', 'students.id', '=', 'presensi.id_siswa')
            ->where('students.status', '=', 'Aktif')
            ->where('setting_data_siswa.id_setting_siswa', $settingSiswa->id)
            ->get();





        return view('presensi.presensi_create_view')
            ->with(compact('students', 'tahunAjaran', 'gurukelas'));
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

    // In your controller
    public function hadirSemua(Request $request)
    {
        try {
            $kelas = $request->input('kelas');
            $tahunAjaran = $request->input('tahun_ajaran');
            $status = $request->input('status');
            $tanggal = $request->input('tanggal');
            $idsSiswa = $request->input('ids_siswa');

            if (is_array($idsSiswa)) {
                foreach ($idsSiswa as $idSiswa) {
                    // Check if a record already exists for this student on the given date
                    $existingPresensi = ModelPresensi::where('id_siswa', $idSiswa)
                        ->where('kelas', $kelas)
                        ->where('tahun_ajaran', $tahunAjaran)
                        ->where('tanggal', $tanggal)
                        ->first();

                    // If a record already exists
                    if ($existingPresensi) {
                        // Check if the status is different
                        if ($existingPresensi->status !== $status) {
                            // Update the existing record with status 'Hadir'
                            $existingPresensi->update(['status' => $status]);
                        }
                    } else {
                        // Create a new presensi record for this student
                        ModelPresensi::create([
                            'id_siswa' => $idSiswa,
                            'kelas' => $kelas,
                            'tahun_ajaran' => $tahunAjaran,
                            'status' => $status,
                            'tanggal' => $tanggal,
                        ]);
                    }
                }
            } else {
                // Handle single value of $idsSiswa
                $idSiswa = $idsSiswa;

                // Check if a record already exists for this student on the given date
                $existingPresensi = ModelPresensi::where('id_siswa', $idSiswa)
                    ->where('kelas', $kelas)
                    ->where('tahun_ajaran', $tahunAjaran)
                    ->where('tanggal', $tanggal)
                    ->first();

                // If a record already exists
                if ($existingPresensi) {
                    // Check if the status is different
                    if ($existingPresensi->status !== $status) {
                        // Update the existing record with status 'Hadir'
                        $existingPresensi->update(['status' => $status]);
                    }
                } else {
                    // Create a new presensi record for this student
                    ModelPresensi::create([
                        'id_siswa' => $idSiswa,
                        'kelas' => $kelas,
                        'tahun_ajaran' => $tahunAjaran,
                        'status' => $status,
                        'tanggal' => $tanggal,
                    ]);
                }
            }



            return response()->json(['message' => 'Presensi berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
