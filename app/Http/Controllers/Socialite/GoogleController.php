<?php

namespace App\Http\Controllers\Socialite;

use Socialite;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackFromGoogle()
    {
       try {
        $user = Socialite::driver('google')->user();
        $user_id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $is_user = User::where('email', $user->getEmail())->first();
        if(!$is_user){

            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ],[
                'unni_id' => $user_id,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId())
            ]);
            $userDetails = UserDetails::create([
                'user_id' => $user_id,
                'user_profile' => 'default.png',
                'user_cover' => 'default.png',
                'user_dob' => null,
                'user_gender' => 'Male',
                'user_mobile' => null,
                'user_phone' => null,
                'user_address_country' => null,
                'user_address_city' => null,
                'user_address_zip' => null,
                'user_address' => null,
                'user_website' => null,
                'user_github' => null,
                'user_linkedin' => null,
                'user_facebook' => null,
                'user_insta' => null,
                'user_twitter' => null,
                'user_account_title' => null,
                'user_account_bank' => null,
                'user_account_iban' => null,
                'description' => null,
            ]);
        }else{
            $saveUser = User::where('email',  $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }

        Auth::loginUsingId($saveUser->id);
        // return redirect()->route('dashboard');
        return redirect()->intended(RouteServiceProvider::ROLE);
       } catch (\Throwable $th) {
           throw $th;
       }
    }
}
