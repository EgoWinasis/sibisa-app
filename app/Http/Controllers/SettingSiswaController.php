<?php

namespace App\Http\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelSettingDataSiswa;
use App\Models\ModelSettingSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingSiswaController extends Controller
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
        $tahun_ajaran = DB::table('tahun_ajaran')
            ->select('id', 'tahun_ajaran', 'status')
            ->orderBy('id')
            ->get();

        return view('setting_siswa.setting_siswa_view')->with(compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $kelas = $request->input('kelas');

        // Check if the id exists in the id_tahun_ajaran column
        $settingSiswa = ModelSettingSiswa::where('id_tahun_ajaran', $id)
            ->where('kelas', $kelas)
            ->first();

        $tahunAjaran = ModelTahunAjaran::where('id', $id)->first();

        if ($settingSiswa && $tahunAjaran) {
            $students = Students::whereIn('id', function ($query) use ($settingSiswa) {
                $query->select('id_student')
                    ->from('setting_data_siswa')
                    ->where('id_setting_siswa', $settingSiswa->id);
            })->get();
            return view('setting_siswa.setting_siswa_edit', compact('settingSiswa', 'kelas', 'tahunAjaran', 'students'));
        } else {
            return view('setting_siswa.setting_siswa_create', compact('kelas', 'tahunAjaran'));
        }
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
            'students_data' => 'required|json|min:1',
            'students_data.*.nis' => 'required|string',
            'students_data.*.nisn' => 'required|string',
            'students_data.*.nama' => 'required|string',
            'tahun_ajaran' => 'required',
            'kelas' => 'required|max:1',
        ]);


        $settingSiswa = ModelSettingSiswa::firstOrCreate([
            'id_tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
        ], [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Check if the students_data is not empty
        if (!empty($request->students_data)) {
            $studentsData = json_decode($request->students_data, true);
            $registeredCount = 0;
            $notRegisteredCount = 0;


            foreach ($studentsData as $student) {
                $nis = $student['nis'];
                $nisn = $student['nisn'];

                // Check if the student exists in the database
                $existingStudent = Students::where('nis', $nis)->where('nisn', $nisn)->first();

                if ($existingStudent) {
                    $registeredCount++;
                    // Store the student in setting_data_siswa
                    $settingDataSiswa = new ModelSettingDataSiswa();
                    $settingDataSiswa->id_setting_siswa = $settingSiswa->id;
                    $settingDataSiswa->id_student = $existingStudent->id;
                    $settingDataSiswa->save();

                    // update tahun ajaran kelas
                    $tahunAjaran = ModelTahunAjaran::where('id', $request->tahun_ajaran)->value('tahun_ajaran');

                    // Update the tahun_ajaran for id_siswa and kelas in ModelKelas
                    ModelKelas::where('id_siswa', $existingStudent->id)
                        ->where('kelas', $request->kelas)
                        ->update(['tahun_ajaran' => $tahunAjaran]);
                } else {
                    $notRegisteredCount++;
                }
            }
        }

        // Calculate total student data
        $totalStudents = count($studentsData);

        // Calculate students not entered
        $studentsNotEntered = $totalStudents - ($registeredCount + $notRegisteredCount);

        // Store the success message and counts in the session
        return redirect()->route('atursiswa.index')->with('success', [
            'success_message' => 'Data siswa berhasil diinput.',
            'total_students' => $totalStudents,
            'registered_count' => $registeredCount,
            'not_registered_count' => $notRegisteredCount,
        ]);
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
        $request->validate([
            'students_data' => 'required|json|min:1',
            'students_data.*.nis' => 'required|string',
            'students_data.*.nisn' => 'required|string',
            'students_data.*.nama' => 'required|string',
            'tahun_ajaran' => 'required',
            'kelas' => 'required|max:1',
        ]);

        // Find the setting siswa by ID
        $settingSiswa = ModelSettingSiswa::find($id);

        // Check if the setting siswa exists
        if (!$settingSiswa) {
            return redirect()->route('atursiswa.index')->with('error', 'Setting siswa not found.');
        }

        if (!empty($request->students_data)) {
            $studentsData = json_decode($request->students_data, true);
            $registeredCount = 0;
            $notRegisteredCount = 0;

            // Fetch existing entries for the given id_tahun_ajaran and kelas
            $existingSettingDataSiswa = ModelSettingDataSiswa::where('id_setting_siswa', $settingSiswa->id)
                ->get();

            // Collect existing student IDs
            $existingStudentIds = $existingSettingDataSiswa->pluck('id_student')->toArray();

            foreach ($studentsData as $student) {
                $nis = $student['nis'];
                $nisn = $student['nisn'];

                // Check if the student exists in the database
                $existingStudent = Students::where('nis', $nis)->where('nisn', $nisn)->first();

                if ($existingStudent) {
                    // Check if the student already exists in setting_data_siswa
                    if (!in_array($existingStudent->id, $existingStudentIds)) {
                        $registeredCount++;
                        // Store the student in setting_data_siswa
                        $settingDataSiswa = new ModelSettingDataSiswa();
                        $settingDataSiswa->id_setting_siswa = $settingSiswa->id;
                        $settingDataSiswa->id_student = $existingStudent->id;
                        $settingDataSiswa->save();
                        // update tahun ajaran kelas
                        $tahunAjaran = ModelTahunAjaran::where('id', $request->tahun_ajaran)->value('tahun_ajaran');

                        // Update the tahun_ajaran for id_siswa and kelas in ModelKelas
                        ModelKelas::where('id_siswa', $existingStudent->id)
                            ->where('kelas', $request->kelas)
                            ->update(['tahun_ajaran' => $tahunAjaran]);
                    } else {
                        // Remove the student ID from the existing list
                        $key = array_search($existingStudent->id, $existingStudentIds);
                        unset($existingStudentIds[$key]);
                    }
                } else {
                    $notRegisteredCount++;
                }
            }

            // Remove entries in setting_data_siswa that are not in the provided student data
            $deletedCount = ModelSettingDataSiswa::where('id_setting_siswa', $settingSiswa->id)
                ->whereIn('id_student', $existingStudentIds)
                ->delete();
        }

        // Calculate total student data
        $totalStudents = count($studentsData);

        // Calculate students not entered
        $studentsNotEntered = $totalStudents - ($registeredCount + $notRegisteredCount);

        // Store the success message and counts in the session
        return redirect()->route('atursiswa.index')->with('success', [
            'success_message' => 'Data siswa berhasil diubah.',
            'total_students' => $totalStudents,
            'registered_count' => $registeredCount,
            'not_registered_count' => $notRegisteredCount,
            'deleted_count' => $deletedCount ?? 0, // Default to 0 if $deletedCount is not set
        ]);
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
