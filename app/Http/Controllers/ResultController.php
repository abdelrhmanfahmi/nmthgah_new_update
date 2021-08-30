<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Projecto;
use App\DataFile;
use App\FilesConsultant;
use App\Requesto;
use App\ProjectoPillar;
use App\ProjectTypes;
use App\Consultant;
use App\ProjectResult;
use App\Pillar;
use App\FinalCertificate;
use App\Standard_Pillar;

use PDF;

class ResultController extends Controller
{
    public function index(){
        $finishedProject = Projecto::with('ProjectoRequests')->whereHas('ProjectoRequests' , function($q){
            $q->where('finishedProject' , '=' , 1);
        })->paginate(10);
        // dd($finishedProject);
        return view('admin.finishedProjects.index' , ['finishedProject' => $finishedProject]);
    }
    
    public function show($id1 , $id2){
        $showFullProject = Projecto::with('ProjectoRequests')->where('request_id' , '=' , $id1)->get();
        $filesOfUserRequestProject = DataFile::where('request_id' , '=' , $id1)->get();
        $consultantsOfProject = ProjectoPillar::with('consultantsProjectoPillar')->where('projectos_id' , '=' , $id2)->get();
        $pillarsOfProject = ProjectoPillar::with('pillarsByRequest_Pillar')->where('projectos_id' , '=' , $id2)->get();
        $filesOfConsultants = FilesConsultant::where('request_id' , '=' , $id1)->get();
        $standardsPillarsUsed = Pillar::with(['ProjectResultsWithItsPillar' => function($q) use($id1 , $id2){
            $q->where('request_id' , '=' , $id1);
            $q->where('projectos_id' , '=' , $id2);
        }])->whereHas('ProjectResultsWithItsPillar' , function($q2) use($id1 , $id2){
            $q2->where('request_id' , '=' , $id1);
            $q2->where('projectos_id' , '=' , $id2);
        })->get();
        // $standardsPillarsUsed1 = ProjectoPillar::where('projectos_id' , '=' , $id2)->get();
        
        // $standardsPillarsUsed = ProjectResult::where('projectos_id' , '=', $id2)->get();
        // $standardsPillarsUsed2 = collect();
        
        // foreach($standardsPillarsUsed1 as $pill){
        //     $standardsPillarsUsed2->push(ProjectResult::with('getPillarsFromProjectResult')->with('getConsultants')->where('projectos_id' , '=', $id2)->where('pillar_id' , '=' , $pill->pillar_id)->get());
        // }
        
        // dd($standardsPillarsUsed1);
        
        return view ('admin.finishedProjects.show' , [
            'showFullProject' => $showFullProject ,
            'filesOfUserRequestProject' => $filesOfUserRequestProject ,
            'consultantsOfProject' => $consultantsOfProject,
            'pillarsOfProject' => $pillarsOfProject,
            'filesOfConsultants' => $filesOfConsultants,
            'standardsPillarsUsed' => $standardsPillarsUsed,
        ]);
    }
    
    public function showForDataPdf1($id1 , $id2){
        $showFullProject = Projecto::with('ProjectoRequests')->where('request_id' , '=' , $id1)->get();
        return $showFullProject;
    }
    
    public function showForDataPdf3($id1 , $id2){
        $consultantsOfProject = ProjectoPillar::with('consultantsProjectoPillar')->where('projectos_id' , '=' , $id2)->get();
        return $consultantsOfProject;
    }
    
    public function showForDataPdf4($id1 , $id2){
        $pillarsOfProject = ProjectoPillar::with('pillarsByRequest_Pillar')->where('projectos_id' , '=' , $id2)->get();
        return $pillarsOfProject;
    }
    
    public function showForDataPdf6($id1 , $id2){
        $standardsPillarsUsed = ProjectResult::where('projectos_id' , '=', $id2)->get();
        return $standardsPillarsUsed;
    }
    
    public function reviewProjectAgain($request_id , $projectos_id){
        Requesto::where('id' , '=' , $request_id)->update(['finishedProject' => 0 , 'statusRequest' => 3]);
        Projecto::where('id' , '=' , $projectos_id)->update(['finishedProjectActual' => 0]);
        // ProjectoPillar::where('projectos_id' , '=' , $projectos_id)->update(['resultConsul' => 0]);
        return redirect()->route('finishedProjects.index');
    }
    
    public function acceptProject($request_id , $projectos_id){
        Requesto::find($request_id)->update(['statusRequest' => 4 ]);
        Projecto::find($projectos_id)->update(['finishedProjectActual' => 1]);
        // Session::put('project_idForUser' , $projectos_id);
        return 1;
    }
    public function pdf($id1 , $id2){
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html($id1 , $id2));
     return $pdf->download('certificate'.$id1.$id2.'.pdf');
    }
    
    public function uploadResultProject(Request $request){
        $file = $request->file('pdf');
        $destinationPath = public_path(). '/uploads/';
        $filename = uniqid() . '.' .  $file->extension();
        $file->move($destinationPath, $filename);
            
            FinalCertificate::create([
                'pdf' => $filename,
                'projectos_id'=> $request->input('projectos_id'),
                'request_id'=> $request->input('request_id'),
            ]);
            Requesto::find($request->input('request_id'))->update(['statusRequest' => 4 ]);
            return 1;
    }
    
    public function checkIfPDFCertificateExistOrNot($request_id){
        if(Requesto::where('id' , '=' , $request_id)->where('statusRequest' , '=' , 4)->first()){
            return 0;
        }else{
            return 1;
        }
    }
    
    public function convert_customer_data_to_html($id1 , $id2){
        $dataInPDF1 = $this->showForDataPdf1($id1 , $id2);
        $dataInPDF3 = $this->showForDataPdf3($id1 , $id2);
        $dataInPDF4 = $this->showForDataPdf4($id1 , $id2);
        $dataInPDF6 = $this->showForDataPdf6($id1 , $id2);
        
        $output = '
        <html>
            <head>
            <title>Certificate</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
              body { font-family: DejaVu Sans, sans-serif;}
            </style>
            
            </head>
            <body>
                <h3 align="center">Certificate</h3>
                <h3 style="direction:rtl;">معلومات عن الطلب</h3>
            ';  
                     foreach($dataInPDF1 as $data1)
                     {
                      $output .= '
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->waqf_name.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->waqf_ownerName.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->waqf_charger.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->city.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->street.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->phone.'</p>
                      <p style="direction:rtl;">'.$data1->ProjectoRequests->desc.'</p>
                      <p style="direction:rtl;">'.\App\User::find($data1->ProjectoRequests->user_id)->first_name . ' ' . \App\User::find($data1->ProjectoRequests->user_id)->last_name.'</p>
                      ';
                    }
                    
                    
                    $output .='
                        <h3 style="direction:rtl">مدير المشروع</h3>
                    ';
                    
                     foreach($dataInPDF1 as $data1)
                     {
                         $output .= '
                            <p style="direction:rtl;">'.\App\Project::find($data1->project_id)->first_name . ' ' . \App\Project::find($data1->project_id)->last_name.'</p>
                         ';
                     }
                     
                     $output .='
                        <h3 style="direction:rtl">مستشاري المشروع</h3>
                    ';
                    
                    foreach($dataInPDF3 as $data3)
                     {
                         $output .= '
                            <p style="direction:rtl;">'.$data3->consultantsProjectoPillar->first_name . ' ' . $data3->consultantsProjectoPillar->last_name.'</p>
                         ';
                     }
                    
                    $output .='
                        <h3 style="direction:rtl">أركان المشروع</h3>
                    ';
                    
                    foreach($dataInPDF4 as $data4)
                     {
                         $output .= '
                            <p style="direction:rtl;">'.$data4->pillarsByRequest_Pillar->name.'</p>
                         ';
                     }
                     
                    
                    $output .='
                        <div class="row">
                                <div class="col-md-12">
                                    <table border="1" class="table table-bordered table-project-manager4">
                                      <thead>
                                        <tr>
                                          <td width="20%">المعيار</td>
                                          <td width="30%">المتطلب</td>
                                          <td width="10%">التكرار السنوي</td>
                                          <td width="10%">القيمة المستهدفة</td>
                                          <td width="10%">نتيجة التدقيق</td>
                                          <td width="50%">التوافق</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          ';
                                          if(count($dataInPDF6) > 0){
                                              foreach($dataInPDF6 as $data6){
                                              $output .='
                                                <tr>
                                                    <td>'.$data6->standard.'</td>
                                                    <td>'.$data6->requirement.'</td>
                                                    <td>'.$data6->annual_frequency.'</td>
                                                    <td>'.$data6->target_value.'</td>
                                                    <td>'.$data6->audit_result.'</td>
                                                    ';
                                                    if($data6->likes == 0){
                                                    $output .= '
                                                    <td class="inResponsive">
                                                        <img class="img1-project-manager4" src="{{asset("assets/images/Group 330.png")}}" width="30px" height="30px">
                                                        <p class="PInproj1detect">مطابق</p>
                                                        <p class="p1detect">حجم الفجوة :'.$data6->gap_size == "null" ? "لا يوجد" : $data6->gap_size.'</p>
                                                    </td>
                                                    ';
                                                    }else{
                                                        $output .='
                                                            <td class="inResponsive">
                                                                <img class="img1-project-manager4" src="{{asset("assets/images/Group 3308.png")}}" width="30px" height="30px">
                                                                <p class="PInproj1detect">غير مطابق</p>
                                                                <p class="p1detect">حجم الفجوة :'.$data6->gap_size == "null" ? "لا يوجد" : $data6->gap_size.'</p>
                                                            </td>
                                                        ';
                                                    }
                                                    $output .='
                                                        </tr>
                                                    ';
                                              }
                                         }else{
                                             $output .= '
                                                <tr>
                                                    <td colspan="5" class="text-center">لم يكتمل هذا المتطلب من ناحية المستشار</td>
                                                </tr>
                                            ';
                                         }
                                          $output .= '
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                            ';
                    
                    
                     
         $output .= '</body></html>';
         return $output;
    }
    
}