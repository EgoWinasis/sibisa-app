<?php

namespace App\Http\Controllers;

use App\Models\ModelWaliMurid;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WaliController extends Controller
{
    public function login()
    {
        return view('wali.login');
    }

    public function authLogin(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        $user = ModelWaliMurid::where('nis', $validatedData['nis'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return back()->withInput()->withErrors(['nis' => 'These credentials do not match our records.']);
        }

        Auth::guard('wali')->login($user);

        return redirect()->route('home.wali'); // Or any other redirect
    }

    public function index()
    {
        $tahunAjaranAktif = DB::table('tahun_ajaran')
            ->select('tahun_ajaran')
            ->where('status', '=', 1)
            ->first();

        $id = DB::table('students')
            ->select('id')
            ->where('nis', '=', auth()->guard('wali')->user()->nis)
            ->orderBy('nis')
            ->first();
        $count = DB::table('presensi')
            ->where('id_siswa', '=', $id->id)
            ->where('tahun_ajaran', '=', $tahunAjaranAktif->tahun_ajaran)
            ->count();
            
        return view('wali.home')->with(compact('count'));
    }
    public function usersWali()
    {


        $students = DB::table('students')
            ->select('id', 'nis', 'nama_lengkap', 'jen_kel', 'status')
            ->orderBy('nis')
            ->get();
        return view('wali.users_wali')->with(compact('students'));
    }

    public function createWaliUser(Request $request)
    {
        $id = $request->input('id');
        $student = Students::find($id);

        if (!$student) {
            return response()->json(['error' => 'Siswa tidak ditemukan'], 404);
        }

        $user = ModelWaliMurid::where('nis', $student->nis)->first();

        if ($user) {
            return response()->json(['error' => 'Akun sudah ada'], 400);
        }

        $user = new ModelWaliMurid();
        $user->nis = $student->nis;
        $user->name = $student->nama_lengkap;
        $user->password = Hash::make($student->nis);

        $user->save();

        return response()->json(['message' => 'User Berhasil dibuat'], 200);
    }
    public function updateWaliUser(Request $request)
    {
        $id = $request->input('id');
        $student = Students::find($id);

        if (!$student) {
            return response()->json(['error' => 'Siswa tidak ditemukan'], 404);
        }

        $isActive = $request->input('status'); // Assuming 'isActive' is sent in the request

        ModelWaliMurid::where('nis', $student->nis)->update(['isActive' => $isActive]);

        return response()->json(['message' => 'Status Akun berhasil diupdate'], 200);
    }
    public function presensi()
    {
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
            ->where('students.nis', '=', auth()->guard('wali')->user()->nis)
            ->groupBy('students.id', 'students.nis', 'students.nama_lengkap')
            ->orderBy('students.nis')
            ->get();


            return view('wali.presensi')->with(compact('students'));

    }
}
