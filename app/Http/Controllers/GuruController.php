<?php

namespace App\Http\Controllers;

use App\Models\ModelGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
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
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        } else {

            $guru = DB::table('guru')
                ->select('id', 'nip', 'nama', 'jen_kel', 'status')
                ->orderBy('nip')
                ->get();

            return view('guru.guru_view')
                ->with(compact('guru'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        } else {
            return view('guru.guru_create_view');
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'jen_kel' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jabatan' => 'required|in:Guru,Kepala Sekolah',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        // Create a new Guru record with the validated data
        ModelGuru::create($validatedData);

        // Redirect back to the form with a success message
        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // Find the data for the specified ID
            $data = ModelGuru::findOrFail($id);

            // Return the data as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Return an error response if the data is not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = ModelGuru::findOrFail($id);

        return view('guru.guru_edit_view', compact('guru'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'jen_kel' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required',
            'jabatan' => 'required|in:Guru,Kepala Sekolah',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        // Find the Guru record with the provided ID
        $guru = ModelGuru::findOrFail($id);

        // Update the Guru record with the validated data
        $guru->update($validatedData);

        // Redirect the user back to the index page with a success message
        return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil diperbarui.');
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
    public function updateStatus(Request $request, $id)
    {
        $guru = ModelGuru::findOrFail($id);
        $guru->status = $request->input('status');
        $guru->save();

        return response()->json(['message' => 'Status Berhasil diperbarui']);
    }
}
