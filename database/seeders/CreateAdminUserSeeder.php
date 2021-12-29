<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetails;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $token_2fa = mt_rand(10000, 99999);
        $user = User::create([
            'unni_id' => $user_id,
            'first_name' => 'Ali',
            'last_name' => 'Sheraz',
            'email' => 'imalisheraz@gmail.com',
            'password' => bcrypt('demo'),
            'token_2fa' => $token_2fa,
            'token_2fa_expiry' => Carbon::now(),
        ]);
        $role = Role::create(['name' => 'superAdmin']);
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
        ]);
        $user->assignRole([$role->id]);
    }
}
