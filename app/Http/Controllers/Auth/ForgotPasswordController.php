<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Handle an incoming password reset link request.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $request->validate(['nip' => 'required|string:max:50']);

        // Check if the email exists in the users table
        $user = DB::table('users')->where('nip', $request->nip)->first();

        if ($user) {
            // If email exists, add a record to the password_resets table
            DB::table('password_resets')->insert([
                'id_user' => $user->id,
                'nip' => $user->nip,
                'status' => "WAITING", // Assuming 0 means the reset link has not been used yet
                'otor_by' => 0, // Or specify the user who triggered the reset
                'created_at' => Carbon::now(),
            ]);

            // Return a message indicating that the password reset link has been added to the table
            return back()->with('status', 'Permintaan reset password sudah terkirim');
        } else {
            // If email does not exist, return an error message
            return back()->withErrors(['nip' => 'NIP not found.']);
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
