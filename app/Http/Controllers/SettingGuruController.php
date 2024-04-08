<?php

namespace App\Http\Controllers;

use App\Models\ModelSettingGuru;
use App\Models\ModelTahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingGuruController extends Controller
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

        return view('setting_guru.setting_guru_view')->with(compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('tahunAjaranId');; // Get the id from the cookie

        // Check if the id exists in the id_tahun_ajaran column
        $guru = ModelSettingGuru::where('id_tahun_ajaran', $id)->first();
        $tahunAjaran = ModelTahunAjaran::where('id', $id)->first();

        $users = User::all();

        if ($guru && $tahunAjaran) {
            return view('setting_guru.setting_guru_edit', compact('guru', 'tahunAjaran', 'users'));
        } else {
            return view('setting_guru.setting_guru_create', compact('tahunAjaran', 'users'));
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
            'guru1' => 'required|different:guru2,guru3,guru4,guru5,guru6',
            'guru2' => 'required|different:guru1,guru3,guru4,guru5,guru6',
            'guru3' => 'required|different:guru1,guru2,guru4,guru5,guru6',
            'guru4' => 'required|different:guru1,guru2,guru3,guru5,guru6',
            'guru5' => 'required|different:guru1,guru2,guru3,guru4,guru6',
            'guru6' => 'required|different:guru1,guru2,guru3,guru4,guru5',
            'tahun_ajaran' => 'required',
        ]);

        // Create a new ModelSettingGuru instance
        $modelSettingGuru = new ModelSettingGuru;

        // Set the values for each guru field
        $modelSettingGuru->id_guru1 = $request->guru1;
        $modelSettingGuru->id_guru2 = $request->guru2;
        $modelSettingGuru->id_guru3 = $request->guru3;
        $modelSettingGuru->id_guru4 = $request->guru4;
        $modelSettingGuru->id_guru5 = $request->guru5;
        $modelSettingGuru->id_guru6 = $request->guru6;

        // Set the tahun_ajaran value
        $modelSettingGuru->id_tahun_ajaran = $request->tahun_ajaran;

        // Save the model
        $modelSettingGuru->save();

        // Redirect to a success page or do something else
        return redirect()->route('aturguru.index')->with('success', 'Data guru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelSettingGuru = ModelSettingGuru::where('id_tahun_ajaran', $id)->firstOrFail();
    
        $usersData = [];
        for ($i = 1; $i <= 6; $i++) {
            $userId = $modelSettingGuru->{'id_guru'.$i};
            $user = User::find($userId);
            if ($user) {
                $usersData[] = $user;
            }
        }
    
        $modelSettingGuru->users = $usersData;
    
        return response()->json($modelSettingGuru);
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
            'guru1' => 'required|different:guru2,guru3,guru4,guru5,guru6',
            'guru2' => 'required|different:guru1,guru3,guru4,guru5,guru6',
            'guru3' => 'required|different:guru1,guru2,guru4,guru5,guru6',
            'guru4' => 'required|different:guru1,guru2,guru3,guru5,guru6',
            'guru5' => 'required|different:guru1,guru2,guru3,guru4,guru6',
            'guru6' => 'required|different:guru1,guru2,guru3,guru4,guru5',
            'tahun_ajaran' => 'required',
        ]);

        // Find the existing ModelSettingGuru instance
        $modelSettingGuru = ModelSettingGuru::findOrFail($id);

        // Set the values for each guru field
        $modelSettingGuru->id_guru1 = $request->guru1;
        $modelSettingGuru->id_guru2 = $request->guru2;
        $modelSettingGuru->id_guru3 = $request->guru3;
        $modelSettingGuru->id_guru4 = $request->guru4;
        $modelSettingGuru->id_guru5 = $request->guru5;
        $modelSettingGuru->id_guru6 = $request->guru6;

        // Set the tahun_ajaran value
        $modelSettingGuru->id_tahun_ajaran = $request->tahun_ajaran;

        // Save the changes
        $modelSettingGuru->save();

        // Redirect to a success page or do something else
        return redirect()->route('aturguru.index')->with('success', 'Data guru berhasil diperbarui');
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
