<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Projecto;
use App\User;
use App\Project;
use App\Consultant;
use App\Pillar;
use App\Requesto;
use App\ProjectoPillar;
use App\Standard_Pillar;
use App\Requirement_Standard_Pillar;
use App\ProjectTypes;


class ProjectosController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth:admin');
        }
        public function index(){
            $projectos = Projecto::where('finishedProjectActual' , '=' , 0)->orderBy('id' , 'desc')->paginate(10);
            return view ('admin.projectos.index' , ['projectos' => $projectos]);
        }
    
        public function create(){
            $users = User::all();
            $pillars = Pillar::all();
            $projects = Project::all();
            $consultants = Consultant::all();
            $requests = Requesto::all();
            return view ('admin.projectos.create' , [
                'users' => $users,
                'pillars' => $pillars,
                'projects' => $projects,
                'consultants' => $consultants,
                'requests' => $requests,
                ]);
        }
    
        public function store(Request $request){
            //  dd($request->all());
            DB::transaction(function () use ($request) {
                
                $request->validate([
                'request_id' => 'required|unique:projectos',
                'user_id' => 'required',
                'project_id' => 'required',
                'pillar_id' => 'required',
                'requirmentsType' => 'required'
            ],
            [
                'request_id.required' => 'يرجي إدخال الطلب',
                'request_id.unique' => 'هذا الطلب موجود مسبقا',
                'user_id.required' => 'يرجي  إدخال اسم المستخدم',
                'project_id.required' => 'يرجي إدخال مدير المشروع',
                'pillar_id.required' => 'يرجي إدخال الركن',
                'requirmentsType.required' => 'يرجي إدخال الالمعايير و المتطلبات بصورة صحيحة',
            ]);
    
    
                $projectos = new Projecto();
                $projectos->request_id = $request->input('request_id');
                $projectos->user_id = $request->input('user_id');
                $projectos->project_id = $request->input('project_id');
                $projectos->finishedProjectActual = 0;
                $projectos->save();
                 
                 Requesto::find($projectos->request_id)->update(['finishedRequest' => 1 , 'statusRequest' => 3 ]);
                 
            //   foreach($request->input('pillar_id') as $rad){
                  foreach($request->input('consultant_id') as $rad2){
                      ProjectoPillar::create([
                        'projectos_id' => $projectos->id,
                        'pillar_id' => Consultant::where('id' , '=' , $rad2)->value('departement'),
                        'consultant_id' => $rad2,
                        'resultConsul' => 0
                    ]);
                  }
            //   }
             
              
              foreach($request->input('requirmentsType') as $pro){
                  ProjectTypes::create([
                        'projectos_id' => $projectos->id,
                        'requirement_id' => $pro['requirement_id'],
                        'standard_id' => $pro['standard_id'],
                        'consultant_id' => $pro['consultant_id'],
                        'target_value_type' => $pro['target_value_type'],
                        'audit_result_type' => $pro['audit_result_type']
                    ]);
              }
              
        });
            return redirect()->route('projectos.index');
            // return back();
        }
    
        public function show($id){
            $projectos = Projecto::find($id);
            $userOfProjecto = Projecto::with('usersProjecto')->where('id' , '=' , $id)->get();
            $projectOfProjecto = Projecto::with('projectManagersProjecto')->where('id' , '=' , $id)->get();
            $requestOfProjecto = Projecto::with('ProjectoRequests')->where('id' , '=' , $id)->get();
            $pillarOfProjecto = ProjectoPillar::with('projectsByProject_Pillar')->with('pillarsByRequest_Pillar')->where('projectos_id' , '=' , $id)->get();
            $consultantsOfProjectPillar = ProjectoPillar::with('projectsByProject_Pillar')->with('consultantsProjectoPillar')->where('projectos_id' , '=' , $id)->get();
            $requirementsProjectsPillars = ProjectTypes::with('projectsByProject_Type')->with('requirementsByProjectoTypes')->where('projectos_id' , '=' , $id)->get();
            // dd($requirementsProjectsPillars);
            return view ('admin.projectos.show' , [
                'projectos' => $projectos,
                'userOfProjecto' => $userOfProjecto,
                'projectOfProjecto' => $projectOfProjecto,
                'consultantsOfProjectPillar' => $consultantsOfProjectPillar,
                'pillarOfProjecto' => $pillarOfProjecto,
                'requestOfProjecto' => $requestOfProjecto,
                'requirementsProjectsPillars' => $requirementsProjectsPillars
                ]);
        }
        
        public function getRequirementIdFromPillar($id){
            $requirements1 = Pillar::with('pillarStandard_Pillar')->where('id' , '=' , $id)->get();
            $consultants = Consultant::with('departementConsultantPillar')->where('departement' , '=' , $id)->get();
            return response()->json([$requirements1 , $consultants]);
        }
        
        public function getRequirementIdFromStandardPillar($id){
            $requirements2 = Standard_Pillar::with('standard_pillar_Requirement_Standard_Pillar')->where('id' , '=' , $id)->get();
            return response()->json($requirements2);
        }
        
        public function getPillarSelected($projectos_id){
            $data = ProjectoPillar::with('consultantsProjectoPillar')->where('projectos_id' , '=' , $projectos_id)->get();
            return response()->json($data);
        }
        
        public function getStandardsOnly($projectos_id , $standard_id){
            $getStandardSelectedOnly = ProjectTypes::with('requirementsByProjectoTypes')->where('projectos_id' , '=' , $projectos_id)->where('standard_id' , '=' , $standard_id)->get();
            return response()->json($getStandardSelectedOnly);
        }
        
        public function getStandardsIdd($projectos_id){
            $getStandards = ProjectTypes::where('projectos_id' , '=' , $projectos_id)->groupBy('standard_id')->get('standard_id');
            return response()->json($getStandards);
        }
        
        public function edit($id){
            $users = User::all();
            $projectos = Projecto::find($id);
            $pillars = Pillar::all();
            $projects = Project::all();
            $consultants = Consultant::all();
            $requests = Requesto::all();
            // $dataFiles = DataFile::with('FileDataRequests')->where('request_id' , '=' , $id)->get();
            
            // $data='';
            
            // foreach($dataFiles as $file){
            //     $data = $file->files;
            // }
    
            return view ('admin.projectos.edit' , [
                'users' => $users,
                'projectos' => $projectos,
                'requests' => $requests,
                'pillars' => $pillars,
                'projects' => $projects,
                'consultants' => $consultants,
                'requests' => $requests
                ]);
        }
        
        public function update(Request $request , $id){
            // dd($request->all());
            DB::transaction(function () use ($request , $id) {
                
                 $this->validate($request, [
                    'request_id' => 'required',
                    'user_id' => 'required',
                    'project_id' => 'required',
                    'requirmentsType' => 'required'
                ]);
    
                $projectos = Projecto::find($id);
                $projectos->request_id = $request->input('request_id');
                $projectos->user_id = $request->input('user_id');
                $projectos->project_id = $request->input('project_id');
                $projectos->save();
                
                
                if($request->has('consultant_id')){
                    ProjectoPillar::where('projectos_id' , '=' , $id)->delete();
                    // foreach($request->input('pillar_id') as $rad){
                        foreach($request->input('consultant_id') as $rad2){
                              ProjectoPillar::create([
                                'projectos_id' => $projectos->id,
                                'pillar_id' => Consultant::where('id' , '=' , $rad2)->value('departement'),
                                'consultant_id' => $rad2,
                                'resultConsul' => 0
                            ]);
                          }
                    // }
                }
                if($request->has('requirmentsType')){
                    ProjectTypes::where('projectos_id' , '=' , $id)->delete();
                        foreach($request->input('requirmentsType') as $pro){
                           ProjectTypes::create([
                                'projectos_id' => $projectos->id,
                                'requirement_id' => $pro['requirement_id'],
                                'standard_id' => $pro['standard_id'],
                                'consultant_id' => $pro['consultant_id'],
                                'target_value_type' => $pro['target_value_type'],
                                'audit_result_type' => $pro['audit_result_type']
                                
                            ]);
                        }
                }
        });
            return redirect()->route('projectos.index');
        }
        
        public function destroy($id){
            $projectos = Projecto::find($id);
            Requesto::where('id' , '=' , $projectos->request_id)->update(['finishedRequest' => 0 , 'statusRequest' => 2]);
            $projectos->delete();
            return redirect()->route('projectos.index');
        }
}
