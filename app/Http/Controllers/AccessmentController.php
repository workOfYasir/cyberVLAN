<?php

namespace App\Http\Controllers;

use App\Models\Accessment;
use App\Models\AssessmentDetail;
use App\Models\AssessmentSubmission;
use App\Models\Models\Result;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $service= Service::all();
       return view('backend.pages.accessment.index',['user'=>$user,'service'=>$service,]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $assessment_detail=new AssessmentDetail();
        $assessment_detail->service_id=$request->service;
        $assessment_detail->user_id=$user->id;
        $assessment_detail->name=$request->name;
        $assessment_detail->save(); 
        $arrayFillter=array_filter($request->answer);
        $arrayIndexSortAnswere= array_values($arrayFillter);
        //  dd($arrayIndexSortAnswere);
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
    }
    //to fetch assessment from db for submisson pass the parmeter assessment id 
    public function fetchAssessment($id){
        $assessment =  Accessment::where('assessment_id', $id)->inRandomOrder()->limit(2)->get();
        return view('frontend.posts.assessment-submit',['assessment'=>$assessment]);
    }
    public function answereStore(Request $request){
    // dd($request);

        // $result= AssessmentSubmission::where('user_id',1)->where('assessment_id',1)->get('submitted_answere');
        // dd($result);
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

    }
}
