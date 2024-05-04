<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Ketidakhadiran;
use App\Models\ModelKenaikan;
use App\Models\ModelTandaTangan;
use App\Models\PelajarPancasila;
use App\Models\Pengetahuan;
use App\Models\Prestasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AjaxNilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updatePancasila(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],
                'a1b1c1' => ['required', 'string', 'max:255'],
                'a1b1c2' => ['required', 'string', 'max:255'],
                'a1b2c1' => ['required', 'string', 'max:255'],
                'a1b2c2' => ['required', 'string', 'max:255'],
                'a1b3c1' => ['required', 'string', 'max:255'],
                'a1b3c2' => ['required', 'string', 'max:255'],
                'a1b4c1' => ['required', 'string', 'max:255'],
                'a1b4c2' => ['required', 'string', 'max:255'],
                'a1b5c1' => ['required', 'string', 'max:255'],
                'a1b5c2' => ['required', 'string', 'max:255'],
                'a1b6c1' => ['required', 'string', 'max:255'],
                'a1b6c2' => ['required', 'string', 'max:255'],
            ],[
                'required' => 'Data tidak boleh kosong',
            ]);
            $validatedData = array_map(function ($value) {
                return $value != '-' ? $value : '';
            }, $validatedData);
            // Update the data in your database
            PelajarPancasila::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'b1c1' => $validatedData['a1b1c1'],
                    'b1c2' => $validatedData['a1b1c2'],
                    'b2c1' => $validatedData['a1b2c1'],
                    'b2c2' => $validatedData['a1b2c2'],
                    'b3c1' => $validatedData['a1b3c1'],
                    'b3c2' => $validatedData['a1b3c2'],
                    'b4c1' => $validatedData['a1b4c1'],
                    'b4c2' => $validatedData['a1b4c2'],
                    'b5c1' => $validatedData['a1b5c1'],
                    'b5c2' => $validatedData['a1b5c2'],
                    'b6c1' => $validatedData['a1b6c1'],
                    'b6c2' => $validatedData['a1b6c2'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function UpdatePengetahuan(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],
                'a2b1c1' => ['nullable', 'string', 'max:255'],
                'a2b1c2' => ['required', 'string'],
                'a2b1c3' => ['nullable', 'string', 'max:255'],
                'a2b1c4' => ['required', 'string'],
                // 
                'a2b2c1' => ['nullable', 'string', 'max:255'],
                'a2b2c2' => ['required', 'string'],
                'a2b2c3' => ['nullable', 'string', 'max:255'],
                'a2b2c4' => ['required', 'string'],
                // 
                'a2b3c1' => ['nullable', 'string', 'max:255'],
                'a2b3c2' => ['required', 'string'],
                'a2b3c3' => ['nullable', 'string', 'max:255'],
                'a2b3c4' => ['required', 'string'],
                // 
                'a2b4c1' => ['nullable', 'string', 'max:255'],
                'a2b4c2' => ['required', 'string'],
                'a2b4c3' => ['nullable', 'string', 'max:255'],
                'a2b4c4' => ['required', 'string'],
                // 
                'a2b5c1' => ['nullable', 'string', 'max:255'],
                'a2b5c2' => ['required', 'string'],
                'a2b5c3' => ['nullable', 'string', 'max:255'],
                'a2b5c4' => ['required', 'string'],
                // 
                'a2b6c1' => ['nullable', 'string', 'max:255'],
                'a2b6c2' => ['required', 'string'],
                'a2b6c3' => ['nullable', 'string', 'max:255'],
                'a2b6c4' => ['required', 'string'],
                // 
                'a2b7c1' => ['nullable', 'string', 'max:255'],
                'a2b7c2' => ['required', 'string'],
                'a2b7c3' => ['nullable', 'string', 'max:255'],
                'a2b7c4' => ['required', 'string'],
                // 
                'a2b8c1' => ['nullable', 'string', 'max:255'],
                'a2b8c2' => ['required', 'string'],
                'a2b8c3' => ['nullable', 'string', 'max:255'],
                'a2b8c4' => ['required', 'string'],
                // 
                'a2b9c1' => ['nullable', 'string', 'max:255'],
                'a2b9c2' => ['required', 'string'],
                'a2b9c3' => ['nullable', 'string', 'max:255'],
                'a2b9c4' => ['required', 'string'],
                // 
                'a2b10c1' => ['nullable', 'string', 'max:255'],
                'a2b10c2' => ['required', 'string'],
                'a2b10c3' => ['nullable', 'string', 'max:255'],
                'a2b10c4' => ['required', 'string'],
                // 
                'a2b11c1' => ['nullable', 'string', 'max:255'],
                'a2b11c2' => ['required', 'string'],
                'a2b11c3' => ['nullable', 'string', 'max:255'],
                'a2b11c4' => ['required', 'string'],
                // 
                'a2b12c1' => ['nullable', 'string', 'max:255'],
                'a2b12c2' => ['required', 'string'],
                'a2b12c3' => ['nullable', 'string', 'max:255'],
                'a2b12c4' => ['required', 'string'],
                // 
                'a2b13c1' => ['nullable', 'string', 'max:255'],
                'a2b13c2' => ['required', 'string'],
                'a2b13c3' => ['nullable', 'string', 'max:255'],
                'a2b13c4' => ['required', 'string'],
            ],[
                'required' => 'Data tidak boleh kosong',
            ]);


            // Set empty fields to '0'
            $validatedData = array_map(function ($value) {
                return $value != '' ? $value : '0';
            }, $validatedData);
            // Update the data in your database
            Pengetahuan::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'b1c1' => $validatedData['a2b1c1'],
                    'b1c2' => $validatedData['a2b1c2'],
                    'b1c3' => $validatedData['a2b1c3'],
                    'b1c4' => $validatedData['a2b1c4'],
                    'b2c1' => $validatedData['a2b2c1'],
                    'b2c2' => $validatedData['a2b2c2'],
                    'b2c3' => $validatedData['a2b2c3'],
                    'b2c4' => $validatedData['a2b2c4'],
                    'b3c1' => $validatedData['a2b3c1'],
                    'b3c2' => $validatedData['a2b3c2'],
                    'b3c3' => $validatedData['a2b3c3'],
                    'b3c4' => $validatedData['a2b3c4'],
                    'b4c1' => $validatedData['a2b4c1'],
                    'b4c2' => $validatedData['a2b4c2'],
                    'b4c3' => $validatedData['a2b4c3'],
                    'b4c4' => $validatedData['a2b4c4'],
                    'b5c1' => $validatedData['a2b5c1'],
                    'b5c2' => $validatedData['a2b5c2'],
                    'b5c3' => $validatedData['a2b5c3'],
                    'b5c4' => $validatedData['a2b5c4'],
                    'b6c1' => $validatedData['a2b6c1'],
                    'b6c2' => $validatedData['a2b6c2'],
                    'b6c3' => $validatedData['a2b6c3'],
                    'b6c4' => $validatedData['a2b6c4'],
                    'b7c1' => $validatedData['a2b7c1'],
                    'b7c2' => $validatedData['a2b7c2'],
                    'b7c3' => $validatedData['a2b7c3'],
                    'b7c4' => $validatedData['a2b7c4'],
                    'b8c1' => $validatedData['a2b8c1'],
                    'b8c2' => $validatedData['a2b8c2'],
                    'b8c3' => $validatedData['a2b8c3'],
                    'b8c4' => $validatedData['a2b8c4'],
                    'b9c1' => $validatedData['a2b9c1'],
                    'b9c2' => $validatedData['a2b9c2'],
                    'b9c3' => $validatedData['a2b9c3'],
                    'b9c4' => $validatedData['a2b9c4'],
                    'b10c1' => $validatedData['a2b10c1'],
                    'b10c2' => $validatedData['a2b10c2'],
                    'b10c3' => $validatedData['a2b10c3'],
                    'b10c4' => $validatedData['a2b10c4'],
                    'b11c1' => $validatedData['a2b11c1'],
                    'b11c2' => $validatedData['a2b11c2'],
                    'b11c3' => $validatedData['a2b11c3'],
                    'b11c4' => $validatedData['a2b11c4'],
                    'b12c1' => $validatedData['a2b12c1'],
                    'b12c2' => $validatedData['a2b12c2'],
                    'b12c3' => $validatedData['a2b12c3'],
                    'b12c4' => $validatedData['a2b12c4'],
                    'b13c1' => $validatedData['a2b13c1'],
                    'b13c2' => $validatedData['a2b13c2'],
                    'b13c3' => $validatedData['a2b13c3'],
                    'b13c4' => $validatedData['a2b13c4'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function UpdateEkstrakulikuler(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],

                'a3b1c1' => ['nullable', 'string', 'max:255'],
                'a3b1c2' => ['nullable', 'string', 'max:255'],
                //
                'a3b2c1' => ['nullable', 'string', 'max:255'],
                'a3b2c2' => ['nullable', 'string', 'max:255'],
            ],[
                'required' => 'Data tidak boleh kosong',
            ]);



            // Update the data in your database
            Ekstrakulikuler::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'b1c1' => $validatedData['a3b1c1'],
                    'b1c2' => $validatedData['a3b1c2'],
                    'b2c1' => $validatedData['a3b2c1'],
                    'b2c2' => $validatedData['a3b2c2'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function UpdatePrestasi(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],

                //
                'a4b1c1' => ['nullable', 'string', 'max:255'],
                'a4b1c2' => ['nullable', 'string', 'max:255'],
                //
                'a4b2c1' => ['nullable', 'string', 'max:255'],
                'a4b2c2' => ['nullable', 'string', 'max:255'],
                //
                'a4b3c1' => ['nullable', 'string', 'max:255'],
                'a4b3c2' => ['nullable', 'string', 'max:255'],
            ],[
                'required' => 'Data tidak boleh kosong',
            ]);



            // Update the data in your database
            Prestasi::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'b1c1' => $validatedData['a4b1c1'],
                    'b1c2' => $validatedData['a4b1c2'],
                    'b2c1' => $validatedData['a4b2c1'],
                    'b2c2' => $validatedData['a4b2c2'],
                    'b3c1' => $validatedData['a4b2c1'],
                    'b3c2' => $validatedData['a4b2c2'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function UpdateKetidakhadiran(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],

                //
                'sakit' => ['nullable', 'string', 'max:255'],
                //
                'izin' => ['nullable', 'string', 'max:255'],
                //
                'tanpa_keterangan' => ['nullable', 'string', 'max:255'],
            ]);

            $validatedData = array_map(function ($value) {
                return $value != '' ? $value : '0';
            }, $validatedData);

            // Update the data in your database
            Ketidakhadiran::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'sakit' => $validatedData['sakit'],
                    'izin' => $validatedData['izin'],
                    'tanpa_keterangan' => $validatedData['tanpa_keterangan'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    public function UpdateKenaikan(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],

                //
                'status' => ['nullable', 'string', 'max:50'],
                'status_kelas' => ['nullable', 'string', 'max:5'],
            ],[
                'required' => 'Data tidak boleh kosong',
            ]);


            // Update the data in your database
            ModelKenaikan::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'status' => $validatedData['status'],
                    'status_kelas' => $validatedData['status_kelas'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function UpdateTtd(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tahun_ajaran' => ['required', 'max:20'],
                'kelas' => ['required', 'max:5'],
                'siswa' => ['required', 'max:255'],

                //
                'kepsek' => ['nullable', 'string', 'max:255'],
                'nip_kepsek' => ['nullable', 'string', 'max:20'],
                'barcode_kepsek' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',
                // wali kelas
                'wali_kelas' => ['nullable', 'string', 'max:255'],
                'nip_wali_kelas' => ['nullable', 'string', 'max:20'],
                'barcode_wali_kelas' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',
                //
                'tgl_print' => ['nullable', 'string', 'max:10'],
            ],[
                'required' => 'Data tidak boleh kosong',
                'image' => 'Harus file gambar',
                'file' => 'Harus file gambar',
                'mimes' => 'Gambar Barcode harus jpg,png atau jpeg',
                'dimension' => 'Dimensi Barcode tidak boleh lebih dari 300p X 300p',
                'max' => 'Barcode tidak boleh lebih dari 2MB',
            ]);


            $validatedData = array_map(function ($value) {
                return $value != '' ? $value : NULL;
            }, $validatedData);

            $get_ttd = ModelTandaTangan::where('tahun_ajaran', $validatedData['tahun_ajaran'])
            ->where('kelas', $validatedData['kelas'])
            ->where('siswa', $validatedData['siswa'])
            ->first();

            if ($request->file('barcode_kepsek')) {
                Storage::delete('public/images/barcode/' . $get_ttd->barcode_kepsek);
                $file = $request->file('barcode_kepsek');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request->file('barcode_kepsek')->storeAs('public/images/barcode', $fileName);
                $validatedData['barcode_kepsek'] = $fileName;
            } else {
                $validatedData['barcode_kepsek'] = $get_ttd->barcode_kepsek;
            }
    
            if ($request->file('barcode_wali_kelas')) {
                Storage::delete('public/images/barcode/' . $get_ttd->barcode_wali_kelas);
                $file = $request->file('barcode_wali_kelas');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request->file('barcode_wali_kelas')->storeAs('public/images/barcode', $fileName);
                $validatedData['barcode_wali_kelas'] = $fileName;
            } else {
                $validatedData['barcode_wali_kelas'] = $get_ttd->barcode_wali_kelas;
            }
            
            // Update the data in your database
            ModelTandaTangan::where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('kelas', $validatedData['kelas'])
                ->where('siswa', $validatedData['siswa'])
                ->update([
                    'kepsek' => $validatedData['kepsek'],
                    'nip_kepsek' => $validatedData['nip_kepsek'],
                    'barcode_kepsek' => $validatedData['barcode_kepsek']?? null,
                    'wali_kelas' => $validatedData['wali_kelas'],
                    'nip_wali_kelas' => $validatedData['nip_wali_kelas'],
                    'barcode_wali_kelas' => $validatedData['barcode_wali_kelas']?? null,
                    'tgl_print' => $validatedData['tgl_print'],
                ]);

            return response()->json(['message' => 'Data updated successfully']);
        } catch (QueryException $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
