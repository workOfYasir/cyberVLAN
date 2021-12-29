<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserReference;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $uuid = '';
        $users = User::all();
        return view('auth.register', ['users' => $users, 'uuid' => $uuid]);
    }

    public function createReferralUser($uuid)
    {
        return view('auth.register', compact('uuid'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user_id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $input = $request->all();

        $user = User::create([
            'unni_id' => $user_id,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
        $external_reference = $input['external_reference'];
        if ($external_reference == 1) {
            $request->validate([
                'external_name'  => 'required|string|max:255',
                'external_email'      => 'required|string|email|max:255',
            ]);
            $external_refer = UserReference::create([
                'name' => $request->external_name,
                'email'  => $request->external_email,
                'user_id' => $user_id
            ]);
        }
        $referral_user = $input['referral_user'];
        if ($referral_user != null || !empty($referral_user) || $referral_user != '') {
            $referral_user_store = $referral_user;
        } else {
            $referral_user_store = '';
        }
        $userDetails = UserDetails::create([
            'user_id' => $user_id,
            'user_profile' => 'media/avatars/user.png',
            'user_cover' => 'media/avatars/user.png',
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
            'referral_user' => $referral_user_store,
        ]);
        if ($request->role == 1) {
            $user->assignRole('freelancer');
        } else  if ($request->role == 2) {
            $user->assignRole('client');
        }
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::EMAIL_VARIFY);
    }
}
