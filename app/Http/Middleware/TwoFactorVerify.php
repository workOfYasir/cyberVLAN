<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->token_2fa_expiry > Carbon::now()) {
            return $next($request);
        }

        $user->token_2fa = mt_rand(10000, 99999);
        $user->save();

        // This is the Twilio way
        // Twilio::message($user->phone_number, 'Two Factor Code: ' . $user->token_2fa);

        $to_name = $user->first_name . ' ' . $user->last_name;
        $to_email = $user->email;
        $email_body = 'Dear ' . $user->first_name . ' ' . $user->last_name . ', Your OTP is ' . $user->token_2fa . '. Use this Passcode to Login.</br>Thank you.';
        $data = array('name' => $user->first_name . ' ' . $user->last_name, 'body' => $email_body);
        Mail::send([], $data, function ($message) use ($to_name, $to_email, $email_body) {
            $message->to($to_email, $to_name)
                ->subject('OTP Verification')
                ->setBody($email_body, 'text/html');
        });
        // If you want to use email instead just 
        // send an email to the user here ..

        return redirect('2fa');
    }
}
