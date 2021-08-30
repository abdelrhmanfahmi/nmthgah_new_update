<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requesto;
use Auth;
use App\DataFile;
use App\FileRequirement;
use App\FilesConsultant;
use App\Consultant;
use App\Pillar;
use App\Standard_Pillar;
use App\ProjectoPillar;
use App\ProjectResult;
use App\reEvalutes;
use Validator;
use Session;
use DB;

class ConsultantManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:consultant');
    }

    public function index(){
        // $consultantos = Requesto::with('consultantsRequest')
        // ->where('consultant_id' , '=' , auth()->user()->id)
        // ->paginate(4);
        
        // $consultantos = Pillar::with('RequestoPillar')->get();
        
        // $consultantos = DB::table('requests')
        // ->join('consultants' , 'requests.consultant_id' , 'consultants.id')
        // ->select('requests.id' , 'requests.waqf_name' , 'requests.created_at' , 'requests.city')
        // ->where('requests.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
        // ->paginate(4);
        
        $consultantos = DB::table('projectos')
        ->join('requests' , 'projectos.request_id' , 'requests.id')
        ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
        ->select('projectos.id as ProjectID' , 'requests.id' , 'requests.waqf_name' , 'requests.created_at' , 'requests.city')
        ->where('projecto_pillars.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
        ->where('projecto_pillars.resultConsul' , '=' , 0)
        ->groupBy('requests.id')
        ->orderBy('id' , 'desc')
        ->paginate(4);
        
        // dd($consultantos);
        
        // $consultantos = Pillar::with('pillarPerConsultant')->with('RequestoPillar')
        // ->where('consultant_id' , '=' , Auth::guard('consultant')->user()->id)
        // ->get();
        // // dd($consultantos);
        // $arr=[];
        // foreach($consultantos as $consult){
        //     array_push($arr , $consult->RequestoPillar);
        // }
        // dd($arr);
        
        return view('users_site.consultantPage' , ['consultantos' => $consultantos]);
    }
    
    public function showProjectConsultant($id){
        // $showRequestConsultant = DB::table('requests')
        // ->where('requests.id' , '=' , $id)
        // ->where('requests.consultant_id' , '=' , auth()->user()->id)
        // ->get();
        
        // $showRequestConsultant = DB::table('requests')
        // ->join('consultants' , 'requests.consultant_id' , 'consultants.id')
        // ->select('requests.*')
        // ->where('requests.id' , '=' , $id)
        // ->where('requests.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
        // ->get();
        
        if(DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('standard__pillars' , 'pillars.id' , 'standard__pillars.pillar_id')
            ->join('requirement__standard__pillars' , 'requirement__standard__pillars.standard_pillar_id' , 'standard__pillars.id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)->first()){
                
                $projectNumber="";
                
            $project_id = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->select('projectos.project_id')
            ->where('projectos.request_id' , '=' , $id)
            ->first();
            
            // dd($project_id->project_id);
            
            Session::put('projectID' , $project_id->project_id);
            $showRequestConsultant = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('standard__pillars' , 'pillars.id' , 'standard__pillars.pillar_id')
            ->join('requirement__standard__pillars' , 'requirement__standard__pillars.standard_pillar_id' , 'standard__pillars.id')
            ->select('requests.*' , 'projectos.id as projectos_id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->groupBy('requests.id')
            ->get();
            // dd($showRequestConsultant);
            $showRequestConsultant2 = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('data_files' , 'data_files.request_id' , 'requests.id')
            ->select('data_files.files' , 'data_files.id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->groupBy('data_files.id')
            ->get();
            
            $showRequestConsultant3 = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('files_consultants' , 'files_consultants.request_id' , 'requests.id')
            ->select('files_consultants.files' , 'files_consultants.id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->groupBy('files_consultants.id')
            ->get();
            
            foreach($showRequestConsultant as $item){
                $projectNumber = $item->projectos_id;
            }
            
            $reasons = reEvalutes::where('consultant_id' , '=' , Auth::guard('consultant')->user()->id)->where('projectos_id' , '=' , $projectNumber)->get();
            
            return view ('users_site.consultantEvaluationPage' , ['showRequestConsultant' => $showRequestConsultant , 'showRequestConsultant2' => $showRequestConsultant2 , 'showRequestConsultant3' => $showRequestConsultant3 , 'reasons' => $reasons]);
        }else{
            abort(404);
        }    
    }
    
    public function showreConsultantEvaluationProject($id){
        $showReConsultantEvaluation = DB::table('requests')
        ->where('requests.id' , '=' , $id)
        ->where('requests.consultant_id' , '=' , auth()->user()->id)
        ->get();
        return view ('users_site.reConsultantEvaluationPage' , ['showReConsultantEvaluation' => $showReConsultantEvaluation]);
    }
    public function showMessagesConslt(){
        return view ('users_site.adminMessagesConsultant');
    }
    public function showConsltPage($id,$id1){
        // $showPageCosnlt = DB::table('requests')
        // ->where('requests.id' , '=' , $id)
        // ->where('requests.consultant_id' , '=' , auth()->user()->id)
        // ->get();
        if(DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            ->join('standard__pillars' , 'project_types.standard_id' , 'standard__pillars.id')
            ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_types.requirement_id')
            ->where('projectos.request_id' , '=' , $id)
            ->where('projectos.id' , '=' , $id1)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)->first()){
                
            // $showPageCosnlt = DB::table('projectos')
            // ->join('requests' , 'projectos.request_id' , 'requests.id')
            // ->join('projecto_pillars' , 'projectos.id' , 'projecto_pillars.projectos_id')
            // ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            // ->join('pillars' , 'pillars.id' ,'projecto_pillars.pillar_id')
            // ->join('standard__pillars' , 'project_types.standard_id' , 'standard__pillars.id')
            // ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_types.requirement_id')
            // ->select('*')
            // ->where('projectos.request_id' , '=' , $id)
            // ->where('projectos.id' , '=' , $id1)
            // ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            // ->groupBy('project_types.requirement_id')
            // ->get();
            
            $showPageCosnlt = DB::table('project_types')
            ->join('projectos' , 'projectos.id' , 'project_types.projectos_id')
            ->join('standard__pillars' , 'standard__pillars.id' , 'project_types.standard_id')
            ->join('requirement__standard__pillars' , 'requirement__standard__pillars.id' , 'project_types.requirement_id')
            ->select('*')
            ->where('project_types.projectos_id' , '=' , $id1)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->simplePaginate(1);
            
            
            // dd($showPageCosnlt);
            
            $showRequestConsultant2 = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('data_files' , 'data_files.request_id' , 'requests.id')
            ->select('data_files.files' , 'data_files.id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->groupBy('data_files.id')
            ->get();
            
            $showRequestConsultant3 = DB::table('projectos')
            ->join('requests' , 'projectos.request_id' , 'requests.id')
            ->join('project_types' , 'projectos.id' , 'project_types.projectos_id')
            ->join('files_consultants' , 'files_consultants.request_id' , 'requests.id')
            ->select('files_consultants.files' , 'files_consultants.id')
            ->where('requests.id' , '=' , $id)
            ->where('project_types.consultant_id' , '=' , Auth::guard('consultant')->user()->id)
            ->groupBy('files_consultants.id')
            ->get();
            
            
            // dd($showPageCosnlt);
            return view ('users_site.consltEvaluationPage1' , ['showPageCosnlt' => $showPageCosnlt , 'showRequestConsultant2' => $showRequestConsultant2 , 'showRequestConsultant3' => $showRequestConsultant3]);
        }else{
            abort(404);
        }
    }
    
    public function getDataOfRequirements($reuirement_id , $projectos_id){
        $data = ProjectResult::where('requirement_id' , '=' , $reuirement_id)->where('projectos_id' , '=' , $projectos_id)->first();
        if($data != null){
            return response()->json($data);
        }else{
            return 0;
        }
    }
    
    public function downloadFilesConsultant($id){
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
    
    public function downloadFilesConsultant2($id){
        $file = DataFile::find($id);
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
    
    public function downloadFilesConsultant3($id){
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
    
    public function downloadAllFiles($id){
        $files1 = DB::table('data_files')
        ->join('requests' , 'requests.id' , 'data_files.request_id')
        ->select('data_files.files')
        ->where('data_files.request_id' , '=' , $id)
        ->get();
        
        $files2 = DB::table('files_consultants')
        ->join('requests' , 'requests.id' , 'files_consultants.request_id')
        ->select('files_consultants.files')
        ->where('files_consultants.request_id' , '=' , $id)
        ->get();
        
        // dd($files1);
        
        $arrays = [];
        
        foreach($files1 as $files){
            array_push($arrays , $files->files);
        }
        
        foreach($files2 as $files){
            array_push($arrays , $files->files);
        }
        
    // dd($arrays);
    
    $zip_file = 'invoices.zip';
    
    $zip = new \ZipArchive();
    $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
    
    for($i = 0 ; $i < count($arrays) ; $i++){
        $zip->addFile(public_path('/uploads/' . $arrays[$i]), $arrays[$i]);
    }
    $zip->close();
    return response()->download($zip_file);
}
    
     public function storeFilesConsultantToProject(Request $request){
        foreach($request->file('files') as $file)
            {
                // $file = $request->file('files');
                $destinationPath = public_path(). '/uploads/';
                $filename = uniqid() . '.' .  $file->extension();
                $file->move($destinationPath, $filename);
                
                FilesConsultant::create([
                    'files' => $filename,
                    'consultant_id'=> $request->input('consultant_id'),
                    'request_id'=> $request->input('request_id'),
                    'pillar_id' => Consultant::where('id' , '=' , Auth::guard('consultant')->user()->id)->value('departement'),
                ]);
            }
           return 1;
    }
    
    public function InsertRequirement(Request $request , $requirement_id , $projectos_id){
        $data = ProjectResult::where('requirement_id' , '=' , $requirement_id)->where('projectos_id' , '=' , $projectos_id)->first();
        if(ProjectResult::where('requirement_id' , '=' , $requirement_id)->where('projectos_id' , '=' , $projectos_id)->first()){
            $id = $data->id;
            
            $insertRequire = ProjectResult::find($id);
            $insertRequire->standard = $request->input('standard');
            $insertRequire->requirement = $request->input('requirement');
            $insertRequire->target_value = $request->input('target_value');
            $insertRequire->audit_result = $request->input('audit_result');
            $insertRequire->annual_frequency = $request->input('annual_frequency');
            $insertRequire->likes = $request->input('likes');
            if($request->input('gap_size') == "لا يوجد حجم فجوة"){
               $insertRequire->gap_size = 'null'; 
            }else{
                $insertRequire->gap_size = $request->input('gap_size');
            }
            $insertRequire->target_value_type = $request->input('target_value_type');
            $insertRequire->requirement_id = $request->input('requirement_id');
            $insertRequire->standard_id = $request->input('standard_id');
            $insertRequire->request_id = $request->input('request_id');
            $insertRequire->projectos_id = $request->input('projectos_id');
            $insertRequire->pillar_id = $request->input('pillar_id');
            $insertRequire->consultant_id = $request->input('consultant_id');
            $insertRequire->save();
            
            return 1;
        }else{
            $insertRequire = new ProjectResult();
            $insertRequire->standard = $request->input('standard');
            $insertRequire->requirement = $request->input('requirement');
            $insertRequire->target_value = $request->input('target_value');
            $insertRequire->audit_result = $request->input('audit_result');
            $insertRequire->annual_frequency = $request->input('annual_frequency');
            $insertRequire->likes = $request->input('likes');
            if($request->input('gap_size') == "لا يوجد حجم فجوة"){
               $insertRequire->gap_size = 'null'; 
            }else{
                $insertRequire->gap_size = $request->input('gap_size');
            }
            $insertRequire->target_value_type = $request->input('target_value_type');
            $insertRequire->requirement_id = $request->input('requirement_id');
            $insertRequire->standard_id = $request->input('standard_id');
            $insertRequire->request_id = $request->input('request_id');
            $insertRequire->projectos_id = $request->input('projectos_id');
            $insertRequire->pillar_id = $request->input('pillar_id');
            $insertRequire->consultant_id = $request->input('consultant_id');
            $insertRequire->save();
            
            return 2;
        }
    }
    
    public function changeStatusOfConsultantRequest($projectos_id , $pillar_id){
        $finalComp = "";
        $completedOrNot = Standard_Pillar::with(['projectTypesStandards' => function($q) use($projectos_id){
                            $q->where('projectos_id' , '=' , $projectos_id);
                        }])->with(['standardPillarToProjectResults' => function($q1) use($projectos_id){
                            $q1->where('projectos_id' , '=' , $projectos_id);
                        }])
                          ->where('pillar_id' , '=' , $pillar_id)
                          ->get();
                          
       foreach($completedOrNot as $item1){
           if(count($item1->projectTypesStandards) == count($item1->standardPillarToProjectResults)){
               $finalComp = "مكتمل";
               $status = ProjectoPillar::where('projectos_id' , '=' , $projectos_id)->where('pillar_id' , '=' , $pillar_id)->update(['resultConsul' => 1]);
               return 1;
           }else{
               $finalComp = "غير مكتمل";
               return 0;
           }
       }
    }
    
}