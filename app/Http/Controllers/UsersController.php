<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Service;
use App\Models\UserDetails;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FreelancerWork;
use App\Models\FreelancerSkill;
use App\Models\freelancerProject;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        return view('backend.layouts.dashboard', compact('user'));
    }
    public function index(Request $request)
    {

        $user = Auth::user();
        $data = User::with('userDetails')->with('userReferences')->get();
        $roles = Role::pluck('name', 'name')->all();

        return view('backend.pages.users.index', compact('data', 'roles', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $roles = Role::pluck('name', 'name')->all();
        return view('backend.pages.users.create', compact('roles', 'user'));
    }

    public function approve(Request $request)
    {
       
        $id=explode(",",$request->approve_id);
        $user = User::whereIn('id',$id)->update([
            'approve'=>$request->approve
        ]);

        return response($id);
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'permissions' => 'required',
        ]);

        $user_id = \Ramsey\Uuid\Uuid::uuid4()->toString();

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
        $input['unni_id'] = $user_id;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $user->givePermissionTo($request->input('permissions'));
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

        return redirect()->route('backend.pages.users.index')
            ->with('success', 'User Created Successfully');
    }



    public function show($id)
    {
        $user = User::find($id);
        return view('backend.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */

    public function change($id)
    {
        $data = User::find($id);
        $roles = Role::pluck('name')->all();
        $permissions = Permission::pluck('name')->all();
        $userRole = $data->roles->pluck('name')->all();
        $userPermissions = $data->permissions->pluck('name')->all();
        return (['data' => $data, 'roles' => $roles, 'permissions' => $permissions, 'userRole' => $userRole, 'userPermissions' => $userPermissions]);
    }

    public function varify()
    { 
        Auth::logout();
        return view('frontend.email');
    }


    public function update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'role' => 'required',
            'permission' => 'required',
        ]);

        $input = $request->all();
        $user = User::find($request->id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $request->id)->delete();
        DB::table('model_has_permissions')->where('model_id', $request->id)->delete();

        $user->assignRole($request->input('role'));
        $user->givePermissionTo($request->input('permission'));

        return redirect()->route('users.index')
            ->with('success', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User Deleted Successfully');
    }


    public function profile($uuid)
    {
        $isUuid = Str::isUuid($uuid);
        $user_uuid = Auth::user()->unni_id;
        if ($isUuid && $user_uuid == $uuid) {
            $user = User::where('unni_id', $uuid)->first();
            $user_details = UserDetails::where('user_id', $uuid)->with('freelancerWork')->with('freelancerSkill')->first();
            $permissions = Permission::all();
            $user_permissions = $user->permissions->all();
            $services = Service::orderBy('name')->get();
            $projects = FreelancerProject::where('user_details_id', $uuid)->get();
     
            return view('frontend.myprofile', compact('user', 'user_details', 'services','permissions','user_permissions','projects','uuid'));
        } else {
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Try again...');
        }
    }

    public function image_update(Request $request) {

        $uuid = $request->input('qqxid');
        $folderPath = public_path('images\profiles\\');
        $image_parts = explode(";base64,", $request->profile);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);
        $path = $imageFullPath.$image_base64;
        $userInfo = UserDetails::where('user_id', $uuid);
        $userInfo->update([
            'user_profile'=>$imageName,
        ]);
        return ['imageName'=>$request->profile];
    }

    public function profile_update(Request $request)
    {
    
        $id = $request->input('xxzyzz');
        $uuid = $request->input('qqxid');
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'document' => 'max:10240',
        ]);
        $user_data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ];
        $user = User::find($id);
        $user->update($user_data);
        $userDetails_data = [
            'user_mobile' => $request->input('user_mobile'),
            'user_phone' => $request->input('user_phone'),
            'user_dob' => $request->input('user_dob'),
            'user_gender' => $request->input('user_gender'),
            'user_address_country' => $request->input('user_address_country'),
            'user_address_city' => $request->input('user_address_city'),
            'user_address_zip' => $request->input('user_address_zip'),
            'user_address' => $request->input('user_address'),
            'user_website' => $request->input('user_website'),
            'user_github' => $request->input('user_github'),
            'user_linkedin' => $request->input('user_linkedin'),
            'user_facebook' => $request->input('user_facebook'),
            'user_insta' => $request->input('user_insta'),
            'user_twitter' => $request->input('user_twitter'),
            'user_account_title' => $request->input('user_account_title'),
            'user_account_bank' => $request->input('user_account_bank'),
            'user_account_iban' => $request->input('user_account_iban'),
            'description' => $request->input('description')
        ];
        
        $userInfo = UserDetails::where('user_id', $uuid);
        $userInfo->update($userDetails_data);
        if($request->input('longitude') && $request->input('latitude')) {
            $userInfo->update([
                'longitude'=>$request->input('longitude'),
                'latitude'=>$request->input('latitude'),
            ]);
        }
        if($request->hasFile('document')) {
             
            $document = $request->file('document') ;
            $documentName = $document->getClientOriginalName() ;
            $destinationPath = public_path('images\documents');
            $document->move($destinationPath,$documentName);
            $userInfo->update([
                'user_document'=>$documentName,
            ]);
        }
        if($request->hasFile('cover')) {
             
            $cover = $request->file('cover') ;
            $coverName = $cover->getClientOriginalName() ;
            $destinationPath = public_path().'/images/covers' ;
            $cover->move($destinationPath,$coverName);
            $userInfo->update([
                'user_cover'=>$coverName,
            ]);
        }
            
        if ($request->input('service') != null) {
            $skill = FreelancerSkill::where('user_details_id',$uuid);
            $skill->delete();
            foreach($request->service as $service)
            {
                $skills_data = FreelancerSkill::create([
                    'freelancer_skill_id' => $service,
                    'user_details_id' =>$uuid,
                ]);
            }
        }
        if($request->input('permission')!=null) {
            DB::table('model_has_permissions')->where('model_id', $user->id)->delete();
            $user->givePermissionTo($request->input('permission'));
        }
   
        $index=0;
        if ($request->work_starting[$index]!= null) {
            $work = FreelancerWork::where('user_details_id',$uuid);
            $work->delete();
            $work_ending = array_values($request->work_ending);
            $work_starting = array_values($request->work_starting);
            $company_name = array_values($request->company_name);
            $designation = array_values($request->designation);
            $company_description = array_values($request->company_description);
            
            foreach(array_filter($request->work_starting) as $array)
            {
                FreelancerWork::create([
                    'user_details_id' => $uuid,
                    'starting_date' => $work_starting[$index],
                    'ending_date' => $work_ending[$index],
                    'company' => $company_name[$index],
                    'designation' => $designation[$index],
                    'description' => $company_description[$index],
                ]);
                $index++;
            }
        }
        $project_index=0;
        if ($request->project_title[$project_index]!= null) {
            $project = FreelancerProject::where('user_details_id',$uuid);
            $project->delete();
            $project_title = array_values($request->project_title);
            $project_description = array_values($request->project_description);

            foreach(array_filter($request->project_title) as $array)
            {
                FreelancerProject::create([
                    'user_details_id' => $uuid,
                    'title' => $project_title[$project_index],
                    'description' => $project_description[$project_index],
                ]);
                $project_index++;
            }
        }
        return redirect()->route('profile', $uuid)
            ->with('success', 'Profile Updated Successfully');
    }

    public function public_profile($uuid)
    {
        $isUuid = Str::isUuid($uuid);
        if ($isUuid) {
            $user = User::where('unni_id', $uuid)->first();
            $user_role=User::role('freelancer')->where('unni_id',$uuid)->first();
            $user_details = UserDetails::with('freelancerWork')->with('freelancerSkill')->where('user_id', $uuid)->first();
           
            return view('frontend.publicprofile', compact('user', 'user_role','user_details'));
        } else {
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Try again...');
        }
    }
    public function freelancerList()
    {
        $userDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->get();
        $services = Service::all();
        $timelines = Permission::all();
        return view('frontend.freelancer-list',['userDetail'=>$userDetail,'services'=>$services,'timelines'=>$timelines]);
    }
    public function freelancerSlider()
    {
        $userDetail = User::role('freelancer')->with('userDetails')->with('skills')->with('work')->get();
        return view('frontend.home',['userDetail'=>$userDetail]);
    }
    
    public function clientList()
    {
        $userDetail = User::role('client')->with('userDetails')->with('skills')->with('work')->get();
        $services = Service::all();
        $timelines = Permission::all();
        return view('frontend.client-list',['userDetail'=>$userDetail,'services'=>$services,'timelines'=>$timelines]);
    }
}
