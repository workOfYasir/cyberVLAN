<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Service;
use App\Models\Accessment;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\AssessmentDetail;
use App\Models\AssessmentSubmission;
use Illuminate\Support\Facades\Auth;

class AccessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $all_service_ids= Service::pluck('id');
        $existed = AssessmentDetail::whereIn('service_id',$all_service_ids)->pluck('service_id');
        $pending = Service::whereNotIn('id',$existed)->get();
        return view('backend.pages.accessment.index',['user'=>$user,'service'=>$pending]);
    }
    public function show()
    {
        $user = Auth::user();
        $service_ids = [];
        $isUuid = Str::isUuid($user->unni_id);
        $user_details = UserDetails::where('user_id', $user->unni_id)->with('freelancerSkill')->first();
      
        foreach ($user_details->freelancerSkill as $key => $service) {      
            array_push($service_ids,$service->freelancer_skill_id);
        }
        
        $assessment_detail_query = AssessmentDetail::whereIn('service_id',$service_ids)->get();
        $assessment_detail = $assessment_detail_query->unique('service_id');
        $assessment_detail->values()->all();
        
        $assessment_ids = Result::where('user_id',$user->id)->pluck('assessment_id');
        $results = Result::where('user_id',$user->id)->get();
        $existed = AssessmentDetail::whereIn('service_id',$service_ids)->whereIn('id',$assessment_ids)->with('score')->with('freelancerSkill')->get();
        $pending = AssessmentDetail::whereIn('service_id',$service_ids)->whereNotIn('id',$assessment_ids)->get();

        return view('frontend.assessments-public',compact('assessment_detail','user_details','user','existed','results','pending'));
    }
     public function public()
    {
        $user = Auth::user();
        $service_ids = [];
        $isUuid = Str::isUuid($user->unni_id);
        $user_details = UserDetails::where('user_id', $user->unni_id)->with('freelancerSkill')->first();
      
        foreach ($user_details->freelancerSkill as $key => $service) {      
            array_push($service_ids,$service->freelancer_skill_id);
        }
        
        $assessment_detail_query = AssessmentDetail::whereIn('service_id',$service_ids)->get();
        $assessment_detail = $assessment_detail_query->unique('service_id');
        $assessment_detail->values()->all();
        
        $assessment_ids = Result::where('user_id',$user->id)->pluck('assessment_id');
        $results = Result::where('user_id',$user->id)->get();
        $existed = AssessmentDetail::whereIn('service_id',$service_ids)->whereIn('id',$assessment_ids)->with('score')->with('freelancerSkill')->get();
        $pending = AssessmentDetail::whereIn('service_id',$service_ids)->whereNotIn('id',$assessment_ids)->get();

        return view('frontend.assessments-tab',compact('assessment_detail','user_details','user','existed','results','pending'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $assessment_detail=new AssessmentDetail();
        $assessment_detail->service_id=$request->service;
        $assessment_detail->user_id=$user->id;
        $assessment_detail->name=$request->name;
        $assessment_detail->save(); 
        $arrayFillter=array_filter($request->answer);
        $arrayIndexSortAnswere= array_values($arrayFillter);
      
        foreach($request->question as $key => $item){
            $assessment =new  Accessment();
            $assessment->assessment_id=$assessment_detail->id;
            $assessment->question= $request->question[$key];
            $assessment->option_1=$request->option_1[$key];
            $assessment->option_2=$request->option_2[$key];
            $assessment->option_3=$request->option_3[$key];
            $assessment->option_4=$request->option_4[$key];
            $assessment->awnser=$arrayIndexSortAnswere[$key];
            $assessment->save();


        }
        return route('accessments.show');
    }
    //to fetch assessment from db for submisson pass the parmeter assessment id 
    public function fetchAssessment($id){

        $assessment =  Accessment::where('assessment_id', $id)->inRandomOrder()->limit(15)->get();
        $assessment_detail = AssessmentDetail::where('id',$id)->with('freelancerSkill')->first();
        return view('frontend.posts.assessment-submit',['assessment'=>$assessment,'assessment_detail'=>$assessment_detail]);
    }
    public function answereStore(Request $request){
        $submittedAnswere=[];$correctAnswere=[];$score=0;
        foreach($request->id as $key=>$item){
            $var='answere'.$key;
            
            $assessment=new AssessmentSubmission();
            $assessment->question_id= $request->id[$key];
            $assessment->assessment_id=$request->assessment_id;
            $assessment->user_id=Auth::user()->id;
            $assessment->submitted_answere =$request->$var;
            $assessment->save();
            $correctAnswere= Accessment::where('id',$request->id[$key])->pluck('awnser');
            $submittedAnswere= AssessmentSubmission::where('user_id',1)->where('question_id',$request->id[$key])->pluck('submitted_answere');
            echo $correctAnswere.''.$submittedAnswere;
            if($correctAnswere==$submittedAnswere){
                $score++;
            }
        }
        $result=($score/count($request->id))*100;
        // dd($request);
        $assessmentResult = new Result();
        $assessmentResult->user_id=Auth::user()->id;
        $assessmentResult->assessment_id=$request->assessment_id;
        $assessmentResult->percentage=$result;
        $assessmentResult->save();

        return redirect()->back();
    }
}