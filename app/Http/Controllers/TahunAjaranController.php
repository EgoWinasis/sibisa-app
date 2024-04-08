<?php

namespace App\Http\Controllers;

use App\Models\ModelTahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAjaranController extends Controller
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

        return view('tahun_ajaran.tahun_ajaran_view')->with(compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun_ajaran.tahun_ajaran_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => ['required', 'string', 'regex:/^\d{4}\/\d{4}$/'],
        ]);

        // Check if tahun_ajaran already exists
        $tahunAjaranExists = ModelTahunAjaran::where('tahun_ajaran', $validatedData['tahun_ajaran'])->exists();

        if ($tahunAjaranExists) {
            return redirect()->route('tahunajaran.index')
                ->with('error', 'Tahun Ajaran already exists.');
        }

        // Tahun Ajaran does not exist, proceed with saving
        $tahunAjaran = new ModelTahunAjaran();
        $tahunAjaran->tahun_ajaran = $validatedData['tahun_ajaran'];
        $tahunAjaran->save();

        return redirect()->route('tahunajaran.index')
            ->with('success', 'Tahun Ajaran created successfully.');
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
        
        $tahun = ModelTahunAjaran::find($id);
        ModelTahunAjaran::where('id', '!=', $id)->update(['status' => 0]);
        $tahun->status = 1;
        $tahun->save();
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
