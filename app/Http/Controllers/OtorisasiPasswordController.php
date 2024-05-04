<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OtorisasiPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                abort(403, 'Unauthorized');
            }

            $user = auth()->user();

            if ($user->role !== 'admin') {
                abort(403, 'Unauthorized');
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('password_resets')
            ->where('status', '=', 'WAITING')
            ->where('otor_by', '=', '0')
            ->join('users', 'password_resets.id_user', '=', 'users.id')
            ->select('password_resets.*', 'users.*')
            ->get();

        // Pass the data to the view
        return view('otorisasi_password.otorisasi_password_view')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $user = Auth::user();

        // Check if the provided password matches the user's password
        if (Hash::check($request->password, $user->password)) {
            // Password is correct
            $userReset = User::findOrFail($id);
            $userReset->password = Hash::make('super1');
            $userReset->save();


            // Update the password_resets table
            DB::table('password_resets')
                ->where('id_user', $id)
                ->update(['status' => 'COMPLETED', 'otor_by' => $user->id]);

            return response()->json(['message' => 'Otorisasi Sukses'], 200);
        } else {
            // Password is incorrect
            return response()->json(['message' => 'Password is incorrect'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
