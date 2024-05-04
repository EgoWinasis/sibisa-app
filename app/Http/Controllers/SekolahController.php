<?php

namespace App\Http\Controllers;

use App\Models\ModelSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profile = DB::table('sekolah')
            ->select('*')
            ->first();
        return view('sekolah.sekolah_view')->with(compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (ModelSekolah::count() > 0) {
            return redirect()->route('sekolah.index')->with('error', 'Data Sekolah sudah ada');
        }
        return view('sekolah.sekolah_create_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ]);

        // Convert the values to uppercase
        $validatedData = array_map('strtoupper', $validatedData);
        // Create or update the profile
        ModelSekolah::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('sekolah.index')->with('success', 'Berhasil Menambahkan Data Profil Sekolah');
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
        $sekolah = ModelSekolah::findOrFail($id);

        return view('sekolah.sekolah_edit_view', compact('sekolah'));
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ]);

        $validatedData = array_map('strtoupper', $validatedData);

        $sekolah = ModelSekolah::findOrFail($id);
        $sekolah->update($validatedData);

        return redirect()->route('sekolah.index')->with('success', 'Profile Sekolah berhasil diperbarui');
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
