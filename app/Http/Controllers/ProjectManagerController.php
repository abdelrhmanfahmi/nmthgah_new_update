<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectMaker;
use App\ProjectoPillar;
use App\Requesto;
use App\ProjectResult;
use App\Admin;
use App\ProjectStandardPillar;
use App\Requirement_Project;
use App\ProjectTypes;
use App\Requirement_Standard_Pillar;
use Auth;
use DB;
use App\Consultant;
use App\MessageFileConsultant;
use App\Pillar;
use App\FilesConsultant;
use Validator;
use App\Standard_Pillar;
use App\MessageFilesAdminProject;
use App\FileRequirement;
use App\DataFile;
use App\reEvalutes;
use Illuminate\Support\Facades\Session;
use App\Projecto;
use Illuminate\Http\Request;

class ProjectManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    public function index(){
        $projectos = DB::table('projectos')
        ->join('requests' , 'requests.id' , 'projectos.request_id')
        ->select('requests.waqf_name' , 'requests.created_at' , 'requests.city' , 'requests.id as request_id' , 'projectos.id')
        ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
        ->where('requests.finishedProject' , '=' , 0)
        ->orderBy('id' , 'desc')
        ->paginate(4);
        return view('users_site.projectPage' , ['projectos' => $projectos]);
    }
    public function showProjectForManager($id,$id1){
        if(Projecto::where('id' , '=' , $id)->where('request_id' , '=' , $id1)->where('project_id' , '=' , auth()->guard('manager')->user()->id)->first()){
            $showProjectForManager1 = Requesto::with('getFilesRequests')
            ->where('id' , '=' , $id1)
            ->get();
            
            $showProjectForManager2 = Projecto::with('ProjectoRequests')
            ->select('*')
            ->where('id' , '=' , $id)
            ->where('project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            $Name = DB::table('requests')
            ->select('*')
            ->where('id' , '=' , $id1)
            ->first();
            Session::put('waqf_name', $Name->waqf_name);
            Session::put('id', $Name->id);
            
            $Name2 = DB::table('projectos')
            ->select('*')
            ->where('id' , '=' , $id)
            ->first();
            Session::put('projectos_ids', $Name2->id);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id1)
            ->where('projectos.id' , '=' , $id)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            // dd($getPillarsOfProjectManager);
            return view ('users_site.mainPageManagerManagment' , ['showProjectForManager1'=> $showProjectForManager1 , 'showProjectForManager2' => $showProjectForManager2 , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    public function showPillarsProjectManager($id,$id1){
        // $showPillarProjectManager = Requesto::with('projectManagersRequest')->with('pillarsRequesto')
        // ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->where('id' , '=' , $id)
        // ->get();
        if(Projecto::where('id' , '=' , $id)->where('request_id' , '=' , $id1)->where('project_id' , '=' , auth()->guard('manager')->user()->id)->first()){
            $showPillarProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('consultants' , 'projecto_pillars.consultant_id' , 'consultants.id')
            ->join('standard__pillars' , 'standard__pillars.pillar_id' , 'pillars.id')
            ->select('requests.waqf_name' , 'consultants.first_name' , 'consultants.last_name' , 'pillars.name' , 'standard__pillars.pillar_id' , 'projectos.request_id' , 'projectos.id' , 'standard__pillars.id as standard_pillarID')
            ->where('requests.id' , '=' , $id1)
            ->where('projectos.id' , '=' , $id)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->groupBy('pillars.name')
            ->get();
            // dd($showPillarProjectManager);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id1)
            ->where('projectos.id' , '=' , $id)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            // dd($getPillarsOfProjectManager);
            
            // $showPillarProjectManager = DB::table('requests')
            // ->join('projects' , 'projects.id' , 'requests.project_manager_id')
            // ->join('pillars' , 'pillars.id' , 'requests.pillar_id')
            // ->join('consultants' , 'consultants.id' , 'pillars.consultant_id')
            // ->select('requests.id' , 'requests.waqf_name' , 'pillars.name' , 'consultants.first_name' , 'consultants.last_name')
            // ->where('requests.id' , '=' , $id)
            // ->where('requests.project_manager_id' , '=' , Auth::guard('manager')->user()->id)
            // ->get();
            // dd($showPillarProjectManager);
            return view ('users_site.pillarsProjectManager' , ['showPillarProjectManager' => $showPillarProjectManager , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    public function getStandardPillars(Request $request , $id1 , $id2 , $id3){
        $finalComp="";
        // $getStandardPillars = Requesto::with('projectManagersRequest')
        // ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->where('id' , '=' , $id)
        // ->get();
        
        // $standard_name = DB::table('requests')
        // ->join('requests_pillar' , 'requests.id' , 'requests_pillar.request_id')
        // ->join('projects' , 'projects.id' , 'requests.project_manager_id')
        // ->join('pillars' , 'pillars.id' , 'requests_pillar.pillar_id')
        // ->join('standard__pillars' , 'standard__pillars.pillar_id' , 'pillars.id')
        // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.standard_pillar_id' , 'standard__pillars.id')
        // ->select('standard__pillars.standard_name')
        // ->where('requests.id' , '=' , $id1)
        // ->where('standard__pillars.pillar_id' , '=' , $id2)
        // ->where('requests.project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->groupBy('standard__pillars.standard_name')
        // ->get();
        // dd($standard_name);
        // Session::put('standard_name' , $standard_name->standard_name);
        
        // $getStandardPillars = DB::table('requests')
        // ->join('requests_pillar' , 'requests.id' , 'requests_pillar.request_id')
        // ->join('projects' , 'projects.id' , 'requests.project_manager_id')
        // ->join('pillars' , 'pillars.id' , 'requests_pillar.pillar_id')
        // ->join('standard__pillars' , 'standard__pillars.pillar_id' , 'pillars.id')
        // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.standard_pillar_id' , 'standard__pillars.id')
        // ->select('standard__pillars.standard_name' , 'requests.target_value' , 'requests.audit_result' , 'requirement__standard__pillars.*')
        // ->where('requests.id' , '=' , $id1)
        // ->where('standard__pillars.pillar_id' , '=' , $id2)
        // ->where('requests.project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->get();
        
        // $url = $request->route('id1');
        
        // $getStandardPillars1 = Standard_Pillar::with('standard_pillar_Pillar')
        // ->where('pillar_id' , '=' , $id3)
        // ->get();
        
        // $getStandardPillars2 = Projecto::with('projectTypesProjectos')
        // ->where('request_id' , '=' , $id2)
        // ->where('id' , '=' , $id1)
        // ->get();
        
        
        // $getStandardPillars = DB::table('projectos')
        // ->join('requests' , 'projectos.request_id' , 'requests.id')
        // ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
        // ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
        // ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
        // ->join('standard__pillars' , 'project_types.standard_id' , 'standard__pillars.id')
        // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_types.requirement_id')
        // ->select('*')
        // ->where('projecto_pillars.pillar_id' , '=' , $id3)
        // ->where('projectos.request_id' , '=' , $id2)
        // ->where('projectos.id' , '=' , $id1)
        // ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
        // ->get();
        
        // $getStandardPillars = ProjectTypes::with('standardsByProjectoTypes')->whereHas('standardsByProjectoTypes' , function($q) use ($id3){
        //     $q->where('pillar_id', '=', $id3);
        // })->with('requirementsByProjectoTypes')
        // ->where('projectos_id' , '=' , $id1)
        // ->get();
        if(Projecto::where('id' , '=' , $id1)->where('request_id' , '=' , $id2)->where('project_id' , '=' , auth()->guard('manager')->user()->id)->first()){
                   
            //   $getStandardPillars = Standard_Pillar::with('projectTypesStandards')->whereHas('projectTypesStandards' , function($q) use ($id1){
            //       $q->where('projectos_id', '=', $id1);
            //   })->with('standard_pillar_Requirement_Standard_Pillar')
            //   ->with('standardPillarToProjectResults')
            //   ->where('pillar_id' , '=' , $id3)
            //   ->get();
            
              $getStandardPillars = Standard_Pillar::with('projectTypesStandards')->whereHas('projectTypesStandards' , function($q) use ($id1){
                  $q->where('projectos_id', '=', $id1);
              })->where('pillar_id' , '=' , $id3)
              ->get();
            // $getStandardPillars = Standard_Pillar::with('projectTypesStandards')->where('pillar_id' , '=' , $id3)->get();
            
                // $completedOrNot = Standard_Pillar::with('projectTypesStandards')->whereHas('projectTypesStandards' , function($q) use ($id1){
                //      $q->where('projectos_id', '=', $id1);
                //   })->with('standardPillarToProjectResults')
                //   ->where('pillar_id' , '=' , $id3)
                //   ->get();
                  
                //   $completedOrNot = Standard_Pillar::with(['projectTypesStandards' => function($q) use($id1){
                //             $q->where('projectos_id' , '=' , $id1);
                //         }])->with(['standardPillarToProjectResults' => function($q1) use($id1){
                //             $q1->where('projectos_id' , '=' , $id1);
                //         }])
                //           ->where('pillar_id' , '=' , $id3)
                //           ->get();
                  
                  Session::put('pillarForRequirement' , $id3);
               
            //   foreach($completedOrNot as $item1){
            //       if(count($item1->projectTypesStandards) == count($item1->standardPillarToProjectResults)){
            //           $finalComp = "مكتمل";
            //       }else{
            //           $finalComp = "غير مكتمل";
            //       }
            //   }
            $completedOrNot = ProjectoPillar::where('projectos_id' , '=' , $id1)->where('pillar_id' , '=' , $id3)->first();
            
            if($completedOrNot->resultConsul == 0){
                $finalComp = 'غير مكتمل';
            }else{
                $finalComp = 'مكتمل';
            }
            
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            // dd($getStandardPillars);
            
            return view ('users_site.standardPillarsForPillar' , ['getStandardPillars' => $getStandardPillars ,  'getPillarsOfProjectManager' => $getPillarsOfProjectManager , 'finalComp'=>$finalComp]);
        }else{
            abort(404);
        }
    }
    public function getRequirementStandardPillars($id1 , $id2 , $id3){
        // $getRequirementsStandard = Requesto::with('projectManagersRequest')
        // ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->where('id' , '=' , $id)
        // ->get();
        if(DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id3)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)->first()){
                
            // $getRequirementsStandard = DB::table('projectos')
            // ->join('requests' , 'projectos.request_id' , 'requests.id')
            // ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            // ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            // ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            // ->join('standard__pillars' , 'pillars.id' , 'standard__pillars.pillar_id')
            // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_types.requirement_id')
            // ->join('project_results' , 'project_results.requirement_id' , 'project_types.requirement_id')
            // ->select('project_results.*'  , 'requirement__standard__pillars.*' , 'project_types.target_value_type')
            // ->where('project_types.standard_id' , '=' , $id1)
            // ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            // ->groupBy('project_results.requirement_id')
            // ->get();
            
            $getRequirementsStandard = DB::table('project_results')
            ->join('projectos' , 'projectos.id' , 'project_results.projectos_id')
            ->join('standard__pillars' , 'standard__pillars.id' , 'project_results.standard_id')
            ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_results.requirement_id')
            ->select('project_results.*'  , 'requirement__standard__pillars.*')
            ->where('project_results.projectos_id' , '=' , $id3)
            ->where('project_results.request_id' , '=' , $id2)
            ->where('project_results.standard_id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->groupBy('project_results.requirement_id')
            ->get();
            
            // dd($getRequirementsStandard);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id3)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            // $checkIfRequirementsHasPer = ProjectTypes::where('projectos_id' , '=' , $id3)->where('standard_id' , '=' , $id1)->get();
            
        // dd($getRequirementsStandard);
            $msg="";
            
            $pillarForRequirement = Session::get('pillarForRequirement');
            
            $checkIfRequestEvaluatedOrNot = ProjectoPillar::where('projectos_id' , '=' , $id3)->where('pillar_id' , '=' , $pillarForRequirement)->first();
            
            if($checkIfRequestEvaluatedOrNot->resultConsul == 0){
                $msg = 'لم يتم انتهاء التقييم من قبل المستشار';
            }else{
                $msg = 'تم انتهاء التقييم من قبل المستشار';
            }
        
            return view ('users_site.RequirementStandardPillarPage' , ['getRequirementsStandard' => $getRequirementsStandard , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager , 'msg' => $msg]);
        }else{
            abort(404);
        }
       
    }
    public function getReEvaluationPillar($id1 , $id2 , $id3){
        // $getReEvaluationPillar = Requesto::with('projectManagersRequest')
        // ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->where('id' , '=' , $id)
        // ->get();
        Session::put('idPillar' , $id3);
        Session::put('idOfRequest' , $id2);
        if(DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('consultants' , 'consultants.id' , 'projecto_pillars.consultant_id')
            ->select('consultants.first_name' , 'consultants.last_name' , 'consultants.id' , 'projecto_pillars.pillar_id' , 'projectos.id as ProjectID')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projecto_pillars.pillar_id' , '=' , $id3)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)->first()){
                
            $getReEvaluationPillar = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('consultants' , 'consultants.id' , 'projecto_pillars.consultant_id')
            ->select('consultants.first_name' , 'consultants.last_name' , 'consultants.id' , 'projecto_pillars.pillar_id' , 'projectos.id as ProjectID')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projecto_pillars.pillar_id' , '=' , $id3)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            // dd($getReEvaluationPillar);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            return view ('users_site.ReEvalutionForPillar' , ['getReEvaluationPillar' => $getReEvaluationPillar , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    
    public function FormRequestProjectConsult(Request $request){
        
        $form = new reEvalutes;
        $form->projectos_id = $request->input('projectos_id');
        $form->pillar_id = $request->input('pillar_id');
        $form->consultant_id = $request->input('consultant_id');
        $form->reason = $request->input('reason');
        
        $form->save();
        $idPillar = Session::get('idPillar');
        $idOfRequest = Session::get('idOfRequest');
        $deletedStandardPillar = ProjectResult::with('getStandardIdFromProjectResults')->where('pillar_id' , '=' , $idPillar)->get();
        
      foreach($deletedStandardPillar as $index){
          $index->delete();
      }
      
    //   Requesto::find($idOfRequest)->update(['resultConsul' => 0]);
      ProjectoPillar::where('projectos_id' , '=' , $form->projectos_id)->where('pillar_id' , '=' , $idPillar)->update(['resultConsul' => 0]);
      
        return 1;
    }
    
    public function getFilesOfProject($id1 , $id2){
        // $getFilesProject = Requesto::with('projectManagersRequest')
        // ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->where('id' , '=' , $id)
        // ->get();
        
        
        
        // $getFilesProject = DB::table('requests_pillar')
        // ->join('pillars' , 'pillars.id' , 'requests_pillar.pillar_id')
        // ->join('requests' , 'requests.id' , 'requests_pillar.request_id')
        // ->join('standard__pillars' , 'standard__pillars.pillar_id' , 'pillars.id')
        // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.standard_pillar_id' , 'standard__pillars.id')
        // ->join('filesRequirement' , 'filesRequirement.requirement_id' , 'requirement__standard__pillars.id')
        // ->join('projects' , 'projects.id' , 'requests.project_manager_id')
        // ->select('filesRequirement.files' , 'filesRequirement.id')
        // ->where('requests_pillar.request_id' , '=' , $id)
        // ->where('requests.project_manager_id' , '=' , Auth::guard('manager')->user()->id)
        // ->get();
        
        // $getFilesProject = DB::table('projectos')
        // ->join('requests' , 'projectos.request_id' , 'requests.id')
        // ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
        // ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
        // ->join('files_consultants' , 'files_consultants.request_id' , 'requests.id')
        // ->select('files_consultants.files' , 'files_consultants.id')
        // ->where('projectos.id' , '=' , $id1)
        // ->where('projectos.request_id' , '=' , $id2)
        // ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
        // ->get();
        if(ProjectoPillar::with('pillarsByRequest_Pillar')->where('projectos_id' , '=' , $id1)->first() && DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)->first()){
            $getAllPillarsOfProject = ProjectoPillar::with('pillarsByRequest_Pillar')->where('projectos_id' , '=' , $id1)->get();
            
            // $pillarFromConsultant = ProjectoPillar::with('pillarsByRequest_Pillar')->get();
            
            // dd($getAllPillarsOfProject);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            // dd($getFilesProject);
            
            return view ('users_site.FilesProjectManager' , ['getAllPillarsOfProject' => $getAllPillarsOfProject , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    
    public function getFilesFromPillars($id1 , $id2){
        $filesFromPillar = FilesConsultant::where('pillar_id' , '=' , $id1)->where('request_id' , '=' , $id2)->get();
        return response()->json($filesFromPillar);
    }
    
    public function downloadFilesManager($id){
        $file = FileRequirement::find($id);
        $path = public_path('/uploads/').$file->files;
        $mimeType = mime_content_type($path);
        
        if($mimeType == 'image/png'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->download($path);
        }else{
            return response()->download($path);
        }
    }
    
    public function downloadFilesFromConsultant($id){
        $file = FilesConsultant::find($id);
        $path = public_path('/uploads/').$file->files;
        $mimeType = mime_content_type($path);
        
        if($mimeType == 'image/png'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->download($path);
        }else{
            return response()->download($path);
        }
    }
    
    public function messangerBetweenProAdmin($id1 , $id2 , $id3){
        if(Projecto::where('id' , '=' , $id1)->where('request_id' , '=' , $id2)->where('project_id' , '=' , $id3)->first()){
                
            $inboxMessageProjectToAdmins = MessageFilesAdminProject::where('project_manager_id' , '=' , $id3)
            ->where('admin_id' , '=' , 1)
            ->where('projectos_id' , '=' , $id1)
            ->where('request_id' , '=' , $id2)
            ->get();
            
            $getMessangerMessage = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('projectos.request_id' , 'projecto_pillars.pillar_id' , 'projectos.id as ProjectID')
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->first();
            
            $adminInfo = Admin::find(1);
            
            Session::put('adminName' , $adminInfo->name);
            Session::put('request_id' , $getMessangerMessage->request_id);
            Session::put('projectos_id' , $getMessangerMessage->ProjectID);
            
            // dd($getMessangerMessage);
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.request_id' , '=' , $id2)
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            
            return view ('users_site.messangerBetweenProjectAdmin' , ['inboxMessageProjectToAdmins' => $inboxMessageProjectToAdmins , 'getMessangerMessage' => $getMessangerMessage , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    
    public function storeMessageProjectToAdmin(Request $request){
        
        $inboxMessageProjectToConsultant = new MessageFilesAdminProject();
        $inboxMessageProjectToConsultant->projectos_id = $request->input('projectos_id');
        $inboxMessageProjectToConsultant->request_id = $request->input('request_id');
        $inboxMessageProjectToConsultant->admin_id = 1;
        $inboxMessageProjectToConsultant->project_manager_id = $request->input('project_manager_id');
        $inboxMessageProjectToConsultant->isAdmin = 0;
        $inboxMessageProjectToConsultant->message = $request->input('message');
        
        
        $inboxMessageProjectToConsultant->save();
        
        return back();
    }
    
    public function storeFilesProjectToAdmin(Request $request){
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = uniqid() . '.' .  $file->extension();
                $file->move($destinationPath, $filename);
                
                MessageFilesAdminProject::create([
                    'files' => $filename,
                    'request_id'=> $request->input('request_id'),
                    'admin_id'=> 1,
                    'project_manager_id'=> $request->input('project_manager_id'),
                    'isAdmin' => 0,
                    'projectos_id' => $request->input('projectos_id')
                ]);
            }
           return 1;
    }
    
    public function getMessagesProjectConsultant($id1 , $id2 , $id3){
        if(Consultant::where('id' , '=' , $id2)->where('departement' , '=' , $id3)->first()){
            $getsMessage = MessageFileConsultant::with('MessageToConsultantProjectManager')
            ->where('project_manager_id' , '=' , Auth::guard('manager')->user()->id)
            ->where('projectos_id' , '=' , $id1)
            ->where('consultant_id' , '=' , $id2)
            ->where('pillar_id' , '=' , $id3)
            ->orderBy('id' , 'asc')
            ->get();
            
            $getPillarsOfProjectManager = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->select('pillars.name' , 'pillars.id' , 'projecto_pillars.consultant_id')
            ->where('projectos.id' , '=' , $id1)
            ->where('projectos.project_id' , '=' , Auth::guard('manager')->user()->id)
            ->get();
            
            $getConsultantName = Consultant::where('id' , '=' , $id2)->where('departement' , '=' , $id3)->first();
            
            Session::put('consultantFirstName' , $getConsultantName->first_name);
            Session::put('consultantLastName' , $getConsultantName->last_name);
            
            return view ('users_site.messagesProjectConsultant' , ['getsMessage' => $getsMessage , 'getPillarsOfProjectManager' => $getPillarsOfProjectManager]);
        }else{
            abort(404);
        }
    }
    
    public function storeMessageProjectToConsultant(Request $request){
        
        $inboxMessageProjectToConsultant = new MessageFileConsultant();
        $inboxMessageProjectToConsultant->projectos_id = $request->input('projectos_id');
        $inboxMessageProjectToConsultant->consultant_id = $request->input('consultant_id');
        $inboxMessageProjectToConsultant->pillar_id = $request->input('pillar_id');
        $inboxMessageProjectToConsultant->project_manager_id = $request->input('project_manager_id');
        $inboxMessageProjectToConsultant->isManager = 1;
        $inboxMessageProjectToConsultant->message = $request->input('message');
        
        
        $inboxMessageProjectToConsultant->save();
        
        return back();
    }
    
    public function storeFilesProjectToConsultant(Request $request){
        foreach($request->file('files') as $file)
            {
                $destinationPath = public_path(). '/uploads/';
                $filename = uniqid() . '.' .  $file->extension();
                $file->move($destinationPath, $filename);
                
                MessageFileConsultant::create([
                    'files' => $filename,
                    'consultant_id'=> $request->input('consultant_id'),
                    'pillar_id'=> $request->input('pillar_id'),
                    'project_manager_id'=> $request->input('project_manager_id'),
                    'isManager' => 1,
                    'projectos_id' => $request->input('projectos_id')
                ]);
            }
           return 1;
    }
    
    public function ShowImagesInMessagesProjectManager($id){
        $msgImage = MessageFilesAdminProject::find($id);
        $path = public_path('uploads/').$msgImage->files;
        $mimeType = mime_content_type($path);
    
        if($mimeType == 'image/png'){
            return response()->file($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->file($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->file($path);
        }else{
            return response()->file($path);
        }
    }
    
    public function downloadImagesInMessagesProjectManager($id){
        $msgImage = MessageFilesAdminProject::find($id);
        $path = public_path('uploads/').$msgImage->files;
        $mimeType = mime_content_type($path);
    
        if($mimeType == 'image/png'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpg'){
            return response()->download($path);
        }elseif($mimeType == 'image/jpeg'){
            return response()->download($path);
        }else{
            return response()->download($path);
        }
    }
    public function checkIfCompletedProjectOrNot($projectos_id , $request_id){
        $checks = Projecto::with('projectTypesProjectos')->with('projectResultProjectos')->where('id' , '=' , $projectos_id)->get();
        $check2 = ProjectoPillar::where('projectos_id' , '=' , $projectos_id)->first();
        if($checks && $check2->resultConsul == 1){
            foreach($checks as $itemos){
                if(count($itemos->projectTypesProjectos) == count($itemos->projectResultProjectos)){
                    Requesto::find($request_id)->update(['finishedProject' => 1]);
                    // ProjectoPillar::where('projectos_id' , '=' , $projectos_id)->update(['resultConsul' => 1]);
                    return 1;
                }else{
                    return 0;
                }
            }
        }else{
            return -1;
        }
    }
    
    public function downloadAllFilesProjectManager($request_id , $pillar_id){
        $filesAll = DB::table('files_consultants')
        ->join('requests' , 'requests.id' , 'files_consultants.request_id')
        ->select('files_consultants.files')
        ->where('files_consultants.request_id' , '=' , $request_id)
        ->where('files_consultants.pillar_id' , '=' , $pillar_id)
        ->get();
        
        // dd($filesAll);
        
        $arrays = [];
        
        foreach($filesAll as $files){
            array_push($arrays , $files->files);
        }
        
    // dd($arrays);
    
    $zip_file = 'InvoicesManager.zip';
    
    $zip = new \ZipArchive();
    $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
    
    for($i = 0 ; $i < count($arrays) ; $i++){
        $zip->addFile(public_path('/uploads/' . $arrays[$i]), $arrays[$i]);
    }
    $zip->close();
    return response()->download($zip_file);
}
}
