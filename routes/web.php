<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', \App\Http\Controllers\UserController::class . '@homePageView')->name('main.homePage');

// Route::get('/homePage' , function(){
//     return view ('users_site.homePage');messangerBetweenProConsultant
// });

// Route::get('/homePage' , function(){
//     return view ('site.home');
// });

Auth::routes();

Route::get('/home', \App\Http\Controllers\HomeController::class . '@index')->name('home')->middleware('auth');

Route::prefix('admin')->group(function () {

    //login system for Admin
    Route::get('/' , \App\Http\Controllers\AdminController::class .'@index')->name('admin.dashboard')->middleware('auth:admin');
    Route::get('/login' , \App\Http\Controllers\Auth\AdminLoginController::class . '@showLoginForm')->name('admin.login');
    Route::post('/login' , \App\Http\Controllers\Auth\AdminLoginController::class .'@login')->name('admin.login.submit');
    
    Route::get('/logout' , \App\Http\Controllers\Auth\AdminLoginController::class . '@logout')->name('admin.logout');
    
    //crud system for Admin
    Route::get('/register' , \App\Http\Controllers\AdminController::class .'@showRegisterForm')->name('admin.register');
    Route::get('/admins' , \App\Http\Controllers\AdminController::class . '@show')->name('admin.show')->middleware('auth:admin');
    Route::get('/create' , \App\Http\Controllers\AdminController::class . '@create')->name('admin.create');
    Route::post('/store' , \App\Http\Controllers\AdminController::class . '@store')->name('admin.store');
    Route::get('/editAdmins/{id}' , \App\Http\Controllers\AdminController::class . '@edit')->name('admin.edit');
    Route::put('/updateAdmins/{id}' , \App\Http\Controllers\AdminController::class . '@update')->name('admin.update');
    Route::get('/deleteAdmins/{id}' , \App\Http\Controllers\AdminController::class . '@delete')->name('admin.delete');

    //crud system for consultants
    Route::get('/consultants' , \App\Http\Controllers\ConsultantController::class . '@index')->name('consultants.index')->middleware('auth:admin');
    Route::get('/consultants/create' , \App\Http\Controllers\ConsultantController::class . '@create')->name('consultants.create');
    Route::post('/consultants/store' , \App\Http\Controllers\ConsultantController::class . '@store')->name('consultants.store');
    Route::get('/editConsultants/{id}' , \App\Http\Controllers\ConsultantController::class . '@edit')->name('consultants.edit');
    Route::put('/updateConsultants/{id}' , \App\Http\Controllers\ConsultantController::class . '@update')->name('consultants.update');
    Route::get('/deleteConsultants/{id}' , \App\Http\Controllers\ConsultantController::class . '@destroy')->name('consultants.delete');
    
    //crud system for users
    Route::get('/users' , \App\Http\Controllers\UserAdminController::class . '@index')->name('users.index')->middleware('auth:admin');
    Route::get('/users/create' , \App\Http\Controllers\UserAdminController::class . '@create')->name('users.create');
    Route::post('/users/store' , \App\Http\Controllers\UserAdminController::class . '@store')->name('users.store');
    Route::get('/editUsers/{id}' , \App\Http\Controllers\UserAdminController::class . '@edit')->name('users.edit');
    Route::put('/updateUsers/{id}' , \App\Http\Controllers\UserAdminController::class . '@update')->name('users.update');
    Route::get('/deleteUsers/{id}' , \App\Http\Controllers\UserAdminController::class . '@destroy')->name('users.delete');

    //crud system for managers
    Route::get('/managers' , \App\Http\Controllers\ProjectController::class . '@index')->name('projects.index')->middleware('auth:admin');
    Route::get('/managers/create' , \App\Http\Controllers\ProjectController::class . '@create')->name('projects.create');
    Route::post('/managers/store' , \App\Http\Controllers\ProjectController::class . '@store')->name('projects.store');
    Route::get('/editManager/{id}' , \App\Http\Controllers\ProjectController::class . '@edit')->name('projects.edit');
    Route::put('/updateManagers/{id}' , \App\Http\Controllers\ProjectController::class . '@update')->name('projects.update');
    Route::get('/deleteManagers/{id}' , \App\Http\Controllers\ProjectController::class . '@destroy')->name('projects.delete');
    
    //crud system for pillars
    Route::get('/pillars' , \App\Http\Controllers\PillarController::class . '@index')->name('pillar.index');
    Route::get('/pillars/create' , \App\Http\Controllers\PillarController::class . '@create')->name('pillar.create');
    Route::post('/pillars/store' , \App\Http\Controllers\PillarController::class . '@store')->name('pillar.store');
    Route::get('/editPillars/{id}' , \App\Http\Controllers\PillarController::class . '@edit')->name('pillar.edit');
    Route::put('/updatePillars/{id}' , \App\Http\Controllers\PillarController::class . '@update')->name('pillar.update');
    Route::get('/deletePillars/{id}' , \App\Http\Controllers\PillarController::class . '@destroy')->name('pillar.delete');

    //crud system for standard_pillar
    Route::get('/stand_pillars' , \App\Http\Controllers\Standard_PillarController::class . '@index')->name('stand_pillars.index');
    Route::get('/stand_pillars/create' , \App\Http\Controllers\Standard_PillarController::class . '@create')->name('stand_pillars.create');
    Route::post('/stand_pillars/store' , \App\Http\Controllers\Standard_PillarController::class . '@store')->name('stand_pillars.store');
    Route::get('/editStand_Pillars/{id}' , \App\Http\Controllers\Standard_PillarController::class . '@edit')->name('stand_pillars.edit');
    Route::put('/updateStand_Pillars/{id}' , \App\Http\Controllers\Standard_PillarController::class . '@update')->name('stand_pillars.update');
    Route::get('/deleteStand_Pillars/{id}' , \App\Http\Controllers\Standard_PillarController::class . '@destroy')->name('stand_pillars.delete');
    Route::get('/getStandardPillars' , \App\Http\Controllers\Standard_PillarController::class . '@getStandardPillars');
    
    //crud system for requestsFromAdmin
    Route::get('/requests' , \App\Http\Controllers\RequestAdminController::class . '@index')->name('requests.index');
    Route::get('/requests/create' , \App\Http\Controllers\RequestAdminController::class . '@create')->name('requests.create');
    Route::post('/requests/store' , \App\Http\Controllers\RequestAdminController::class . '@store')->name('requests.store');
    Route::get('/showRequests/{id}' , \App\Http\Controllers\RequestAdminController::class . '@show')->name('requests.show');
    Route::get('/editRequests/{id}' , \App\Http\Controllers\RequestAdminController::class . '@edit')->name('requests.edit');
    Route::put('/updateRequests/{id}' , \App\Http\Controllers\RequestAdminController::class . '@update')->name('requests.update');
    Route::get('/deleteRequests/{id}' , \App\Http\Controllers\RequestAdminController::class . '@destroy')->name('requests.delete');
    Route::get('/downloadImagesFilesFromRequestAdmin/{id}' , \App\Http\Controllers\RequestAdminController::class . '@downloadFilesFromAdminPanlRequests');
    Route::get('/deleteDataFileImage/{id}' , \App\Http\Controllers\RequestAdminController::class . '@deleteDataFileImage');
    Route::get('/ProjectFromRequest/{id}' , \App\Http\Controllers\RequestAdminController::class . '@createProjectFromRequest');
    //crud system for SetPrpjectToClient
    Route::get('/projectos' , \App\Http\Controllers\ProjectosController::class . '@index')->name('projectos.index');
    Route::get('/projectos/create' , \App\Http\Controllers\ProjectosController::class . '@create')->name('projectos.create');
    Route::post('/projectos/store' , \App\Http\Controllers\ProjectosController::class . '@store')->name('projectos.store');
    Route::get('/showProjectos/{id}' , \App\Http\Controllers\ProjectosController::class . '@show')->name('projectos.show');
    Route::get('/editProjectos/{id}' , \App\Http\Controllers\ProjectosController::class . '@edit')->name('projectos.edit');
    Route::put('/updateProjectos/{id}' , \App\Http\Controllers\ProjectosController::class . '@update')->name('projectos.update');
    Route::get('/deleteProjectos/{id}' , \App\Http\Controllers\ProjectosController::class . '@destroy')->name('projectos.delete');
    
    //results
    Route::get('/finishedProjects' , \App\Http\Controllers\ResultController::class . '@index')->name('finishedProjects.index');
    Route::get('/showFinishedProjects/{id1}/{id2}' , \App\Http\Controllers\ResultController::class . '@show')->name('finishedProjects.show');
    Route::get('/reviewProject/{request_id}/{projectos_id}' , \App\Http\Controllers\ResultController::class . '@reviewProjectAgain')->name('finishedProjects.review');
    Route::get('/dynamic_pdf/{id1}/{id2}', \App\Http\Controllers\ResultController::class . '@pdf');
    Route::get('/CheckIfCertificateExist/{id1}', \App\Http\Controllers\ResultController::class . '@checkIfPDFCertificateExistOrNot');
    Route::get('/acceptProjectToUser/{request_id}/{projectos_id}' , \App\Http\Controllers\ResultController::class . '@acceptProject');
    
    Route::post('/uploadResultProjectForUser' , \App\Http\Controllers\ResultController::class . '@uploadResultProject')->name('uploadPDFForUser');
    
    //Standard establishment service
    Route::get('/establish' , \App\Http\Controllers\EstablishController::class . '@index')->name('establish.index');
    Route::get('/establish/create' , \App\Http\Controllers\EstablishController::class . '@create')->name('establish.create');
    Route::post('/establish/store' , \App\Http\Controllers\EstablishController::class . '@store')->name('establish.store');
    Route::get('/editEstablish/{id}' , \App\Http\Controllers\EstablishController::class . '@edit')->name('establish.edit');
    Route::put('/updateEstablish/{id}' , \App\Http\Controllers\EstablishController::class . '@update')->name('establish.update');
    Route::get('/deleteEstablish/{id}' , \App\Http\Controllers\EstablishController::class . '@delete')->name('establish.delete');
    
    //Management Consulting service
    Route::get('/consulManag' , \App\Http\Controllers\ConsultingManagingController::class . '@index')->name('consulManag.index');
    Route::get('/consulManag/create' , \App\Http\Controllers\ConsultingManagingController::class . '@create')->name('consulManag.create');
    Route::post('/consulManag/store' , \App\Http\Controllers\ConsultingManagingController::class . '@store')->name('consulManag.store');
    Route::get('/editConsulManage/{id}' , \App\Http\Controllers\ConsultingManagingController::class . '@edit')->name('consulManag.edit');
    Route::put('/updateConsulManage/{id}' , \App\Http\Controllers\ConsultingManagingController::class . '@update')->name('consulManag.update');
    Route::get('/deleteConsulManage/{id}' , \App\Http\Controllers\ConsultingManagingController::class . '@delete')->name('consulManag.delete');
    
    //types Of Consulting Managing
    Route::get('/typesConsul' , \App\Http\Controllers\TypesConsultingManagingController::class . '@index')->name('typesConsul.index');
    Route::get('/typesConsul/create' , \App\Http\Controllers\TypesConsultingManagingController::class . '@create')->name('typesConsul.create');
    Route::post('/typesConsul/store' , \App\Http\Controllers\TypesConsultingManagingController::class . '@store')->name('typesConsul.store');
    Route::get('/editTypesConsul/{id}' , \App\Http\Controllers\TypesConsultingManagingController::class . '@edit')->name('typesConsul.edit');
    Route::put('/updateTypesConsul/{id}' , \App\Http\Controllers\TypesConsultingManagingController::class . '@update')->name('typesConsul.update');
    Route::get('/deleteTypesConsul/{id}' , \App\Http\Controllers\TypesConsultingManagingController::class . '@delete')->name('typesConsul.delete');
    
    //request ajax
    Route::get('/getRequirementsPillar/{id}' , \App\Http\Controllers\ProjectosController::class . '@getRequirementIdFromPillar');
    Route::get('/getRequirementsStandardPillar/{id}' , \App\Http\Controllers\ProjectosController::class . '@getRequirementIdFromStandardPillar');
    Route::get('/getDataOfEditPage/{projectos_id}' , \App\Http\Controllers\ProjectosController::class . '@getDataOfEdit');
    Route::get('/getPillarSelected/{projectos_id}' , \App\Http\Controllers\ProjectosController::class . '@getPillarSelected');
    Route::get('/getStandardsOnly/{projectos_id}/{standard_id}' , \App\Http\Controllers\ProjectosController::class . '@getStandardsOnly');
    Route::get('/getStandardsIdd/{standard_id}' , \App\Http\Controllers\ProjectosController::class . '@getStandardsIdd');
    
    //crud system for requirement_standard_pillar
    Route::get('/req_stand_pillars' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@index')->name('req_stand_pillars.index');
    Route::get('/req_stand_pillars/create' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@create')->name('req_stand_pillars.create');
    Route::post('/req_stand_pillars/store' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@store')->name('req_stand_pillars.store');
    Route::get('/showReq_Stand_Pillars/{id}' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@show')->name('req_stand_pillars.show');
    Route::get('/editReq_Stand_Pillars/{id}' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@edit')->name('req_stand_pillars.edit');
    Route::put('/updateReq_Stand_Pillars/{id}' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@update')->name('req_stand_pillars.update');
    Route::get('/deleteReq_Stand_Pillars/{id}' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@destroy')->name('req_stand_pillars.delete');
    Route::get('/getStandardFromPillar/{id}' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@getStandardPillarsFromPillar');
    Route::get('/getRequirementFromStandard' , \App\Http\Controllers\Requirement_Standard_PillarController::class . '@getRequirementStandardPillars');
    
    //ajax requestes
    Route::get('/pillarsStandard/{id}' , \App\Http\Controllers\ProjectMakerController::class . '@pillarStandard');
    Route::get('/StandardRequirements/{id}' , \App\Http\Controllers\ProjectMakerController::class . '@ٍStandardRequirements');
    
    //crud system for inbox_Messages
    Route::get('/inbox' , \App\Http\Controllers\InboxController::class . '@index')->name('inbox.index');
    Route::get('/inbox/create' , \App\Http\Controllers\InboxController::class . '@create')->name('inbox.create');
    Route::post('/inbox/store' , \App\Http\Controllers\InboxController::class . '@store')->name('inbox.store');
    Route::get('/showInbox/{message}/{user}' , \App\Http\Controllers\InboxController::class . '@show')->name('inbox.show');
    Route::get('/editInbox/{id}' , \App\Http\Controllers\InboxController::class . '@edit')->name('inbox.edit');
    Route::put('/updateInbox/{id}' , \App\Http\Controllers\InboxController::class . '@update')->name('inbox.update');
    Route::get('/deleteInbox/{id}' , \App\Http\Controllers\InboxController::class . '@destroy')->name('inbox.delete');

    Route::get('/downloadImageAdmin/{id}' , \App\Http\Controllers\InboxController::class . '@downloadImagesForAdmin');
    Route::get('/showImageAdmin/{id}' , \App\Http\Controllers\InboxController::class . '@ShowImagesForAdmin');
    // Route::get('/countAdmins' , \App\Http\Controllers\AdminController::class . '@countMessagesForAdmin');
    
    //CRUD system for services
    Route::get('/services' , \App\Http\Controllers\ServiceController::class . '@index')->name('services.index');
    Route::get('/services/create' , \App\Http\Controllers\ServiceController::class . '@create')->name('services.create');
    Route::post('/services/store' , \App\Http\Controllers\ServiceController::class . '@store')->name('services.store');
    Route::get('/editService/{id}' , \App\Http\Controllers\ServiceController::class . '@edit')->name('services.edit');
    Route::put('/updateService/{id}' , \App\Http\Controllers\ServiceController::class . '@update')->name('services.update');
    Route::get('/deleteService/{id}' , \App\Http\Controllers\ServiceController::class . '@destroy')->name('service.delete');
    
    //update & Delete system for settings
    Route::get('/settings' , \App\Http\Controllers\SettingController::class . '@index')->name('settings.index');
    Route::get('/editSetting/{id}' , \App\Http\Controllers\SettingController::class . '@edit')->name('settings.edit');
    Route::put('/updateSetting/{id}' , \App\Http\Controllers\SettingController::class . '@update')->name('settings.update');
    Route::get('/deleteSetting/{id}' , \App\Http\Controllers\SettingController::class . '@destroy')->name('settings.delete');
    
    //Evaluation_Demo
    Route::get('/evaluate' , \App\Http\Controllers\QuestionEvaluation::class . '@index')->name('evaluate.index');
    Route::get('/evaluate/create' , \App\Http\Controllers\QuestionEvaluation::class . '@create')->name('evaluate.create');
    Route::post('/evaluate/store' , \App\Http\Controllers\QuestionEvaluation::class . '@store')->name('evaluate.store');
    Route::get('/editQuestion/{id}' , \App\Http\Controllers\QuestionEvaluation::class . '@edit')->name('evaluate.edit');
    Route::put('/updateQuestion/{id}' , \App\Http\Controllers\QuestionEvaluation::class . '@update')->name('evaluate.update');
    Route::get('/deleteQuestion/{id}' , \App\Http\Controllers\QuestionEvaluation::class . '@destroy')->name('evaluate.delete');
    
    Route::get('/getResultsOfUsers' , \App\Http\Controllers\ResultServiceController::class . '@index')->name('result.index');
    Route::get('/showResults/{id}' , \App\Http\Controllers\ResultServiceController::class . '@show')->name('result.show');
    
    
    //crud system for indicators
    Route::get('/indicator' , \App\Http\Controllers\IndicatorController::class . '@index')->name('indicator.index');
    Route::get('/indicator/create' , \App\Http\Controllers\IndicatorController::class . '@create')->name('indicator.create');
    Route::post('/indicator/store' , \App\Http\Controllers\IndicatorController::class . '@store')->name('indicator.store');
    Route::get('/editIndicator/{id}' , \App\Http\Controllers\IndicatorController::class . '@edit')->name('indicator.edit');
    Route::put('/updateIndicator/{id}' , \App\Http\Controllers\IndicatorController::class . '@update')->name('indicator.update');
    Route::get('/deleteIndicator/{id}' , \App\Http\Controllers\IndicatorController::class . '@destroy')->name('indicator.delete');

    //CRUD system for teams
    Route::get('/teams' , \App\Http\Controllers\TeamController::class . '@index')->name('teams.index');
    Route::get('/teams/create' , \App\Http\Controllers\TeamController::class . '@create')->name('teams.create');
    Route::post('/teams/store' , \App\Http\Controllers\TeamController::class . '@store')->name('teams.store');
    Route::get('/editTeam/{id}' , \App\Http\Controllers\TeamController::class . '@edit')->name('teams.edit');
    Route::put('/updateTeam/{id}' , \App\Http\Controllers\TeamController::class . '@update')->name('teams.update');
    Route::get('/deleteTeam/{id}' , \App\Http\Controllers\TeamController::class . '@destroy')->name('teams.delete');
    
    //CRUD system for values
    Route::get('/values' , \App\Http\Controllers\ValuesController::class . '@index')->name('values.index');
    Route::get('/values/create' , \App\Http\Controllers\ValuesController::class . '@create')->name('values.create');
    Route::post('/values/store' , \App\Http\Controllers\ValuesController::class . '@store')->name('values.store');
    Route::get('/editValues/{id}' , \App\Http\Controllers\ValuesController::class . '@edit')->name('values.edit');
    Route::put('/updateValues/{id}' , \App\Http\Controllers\ValuesController::class . '@update')->name('values.update');
    Route::get('/deleteValues/{id}' , \App\Http\Controllers\ValuesController::class . '@destroy')->name('values.delete');

    //CRUD system for partners
    Route::get('/partners' , \App\Http\Controllers\PartnerController::class . '@index')->name('partners.index');
    Route::get('/partners/create' , \App\Http\Controllers\PartnerController::class . '@create')->name('partners.create');
    Route::post('/partners/store' , \App\Http\Controllers\PartnerController::class . '@store')->name('partners.store');
    Route::get('/editPartner/{id}' , \App\Http\Controllers\PartnerController::class . '@edit')->name('partners.edit');
    Route::put('/updatePartner/{id}' , \App\Http\Controllers\PartnerController::class . '@update')->name('partners.update');
    Route::get('/deletePartner/{id}' , \App\Http\Controllers\PartnerController::class . '@destroy')->name('partners.delete');
    
    //CRUD system for agents
    Route::get('/agents' , \App\Http\Controllers\AgentController::class . '@index')->name('agents.index');
    Route::get('/agents/create' , \App\Http\Controllers\AgentController::class . '@create')->name('agents.create');
    Route::post('/agents/store' , \App\Http\Controllers\AgentController::class . '@store')->name('agents.store');
    Route::get('/editAgent/{id}' , \App\Http\Controllers\AgentController::class . '@edit')->name('agents.edit');
    Route::put('/updateAgent/{id}' , \App\Http\Controllers\AgentController::class . '@update')->name('agents.update');
    Route::get('/deleteAgent/{id}' , \App\Http\Controllers\AgentController::class . '@destroy')->name('agents.delete');

    //CRUD system for courses
    Route::get('/courses' , \App\Http\Controllers\CourseController::class . '@index')->name('courses.index');
    Route::get('/courses/create' , \App\Http\Controllers\CourseController::class . '@create')->name('courses.create');
    Route::post('/courses/store' , \App\Http\Controllers\CourseController::class . '@store')->name('courses.store');
    Route::get('/showCourse/{id}' , \App\Http\Controllers\CourseController::class . '@show')->name('courses.show');
    Route::get('/editCourse/{id}' , \App\Http\Controllers\CourseController::class . '@edit')->name('courses.edit');
    Route::put('/updateCourse/{id}' , \App\Http\Controllers\CourseController::class . '@update')->name('courses.update');
    Route::get('/deleteCourse/{id}' , \App\Http\Controllers\CourseController::class . '@destroy')->name('courses.delete');
    
    Route::get('/messages' , \App\Http\Controllers\MessageController::class . '@index')->name('messages.index');
    Route::post('/messages/store' , \App\Http\Controllers\MessageController::class . '@store')->name('messages.store');
    Route::get('/showMessage/{id}' , \App\Http\Controllers\MessageController::class . '@show')->name('messages.show');
    Route::get('/editMessage/{id}' , \App\Http\Controllers\MessageController::class . '@edit')->name('messages.edit');
    Route::put('/updateMessage/{id}' , \App\Http\Controllers\MessageController::class . '@update')->name('messages.update');
    Route::get('/deleteMessage/{id}' , \App\Http\Controllers\MessageController::class . '@destroy')->name('messages.delete');
    
    //messagesUserForAdmin
    Route::get('/userMessagesForAdmin/{id1}/{id2}' , \App\Http\Controllers\MessageController::class . '@getMessagesForAdmin')->name('messagesUser.index');
    Route::post('/storeMessageFromAdminToUser', \App\Http\Controllers\MessageController::class . '@storeMessageForAdmin')->name('messagesUser.Store');
    Route::post('/storeMessageFromAdminToUserFiles', \App\Http\Controllers\MessageController::class . '@storeMessageForAdminFiles')->name('messagesUserFile.Store');
    
    //messagesProjectAdmin
    Route::get('/messagesBetweenAdminProject/{id1}/{id2}/{id3}' , \App\Http\Controllers\MessageController::class . '@indexAdminProjectMessages');
    Route::post('/storeAdminToProjectMessage' , \App\Http\Controllers\MessageController::class . '@storeMessageProjectToAdmin2')->name('ProjectStoreMsg2');
    Route::post('/storeAdminToProjectFiles' , \App\Http\Controllers\MessageController::class . '@storeFilesProjectToAdmin2')->name('ProjectStoreFile2');
    
    Route::get('/contacts' , \App\Http\Controllers\ContactController::class . '@index')->name('contactsAdmin.index');
    Route::get('/editContact/{id}' , \App\Http\Controllers\ContactController::class . '@edit')->name('contactsAdmin.edit');
    Route::put('/updateContact/{id}' , \App\Http\Controllers\ContactController::class . '@update')->name('contactsAdmin.update');
    
    Route::get('/savedCourses' , \App\Http\Controllers\CourseController::class . '@saved')->name('courses.saved');
    Route::get('/paidCourses' , \App\Http\Controllers\CourseController::class . '@paid')->name('courses.paid');
    
    Route::get('/showCourseSaved/{id}/{id2}' , \App\Http\Controllers\CourseController::class . '@showSaved');
    // Route::get('/editCourseSaved/{id}' , \App\Http\Controllers\CourseController::class . '@editSaved');
    // Route::put('/updateCourseSaved/{id}' , \App\Http\Controllers\CourseController::class . '@updateSaved');
    Route::delete('/deleteCourseSaved/{id}' , \App\Http\Controllers\CourseController::class . '@deleteSaved');


    Route::get('/showCoursePaid/{id}/{id2}' , \App\Http\Controllers\CourseController::class . '@showPaid');
     // Route::get('/editCourseSaved/{id}' , \App\Http\Controllers\CourseController::class . '@editSaved');
    // Route::put('/updateCourseSaved/{id}' , \App\Http\Controllers\CourseController::class . '@updateSaved');
    Route::delete('/deleteCoursePaid/{id}' , \App\Http\Controllers\CourseController::class . '@deletePaid');

    // Route::get('/logout' , function(){
    // Auth::guard('admin')->logout();
    // Session::flush();
    // return redirect()->route('admin.login');
    // })->name('admin.logout');

});

Route::post('/loginUser' , \App\Http\Controllers\Auth\LoginController::class . '@login');
Route::get('/logout' , \App\Http\Controllers\Auth\LoginController::class . '@userLogout')->name('user.logout');

// Route::get('/logout' , function(){
//     Auth::guard('web')->logout();
//     Session::flush();
//     return redirect('/login');
// })->name('user.logout');

Route::get('/indicator' , function(){
    return view ('login');
});

Route::get('/indicatorInfo' , function(){
    return view ('site.indicatorInfo');
});

Route::get('/evaluateServices' , \App\Http\Controllers\UserController::class . '@getViewOfPillarsAndQuestions');
Route::get('/getQuestionsFromPillars' , \App\Http\Controllers\UserController::class . '@getQuestionsFromPillar');
Route::post('/insertResults' , \App\Http\Controllers\ResultServiceController::class . '@store')->name('result.store');

Route::get('/showResultsForUser/{id}' , \App\Http\Controllers\UserController::class . '@showResultsAndCertificate')->name('results.user');

Route::get('/establishment' , \App\Http\Controllers\UserController::class . '@getViewOfEstablishment');
Route::post('/saveDataOfEstablish' , \App\Http\Controllers\UserController::class . '@SaveDataOfEstablishment');

Route::get('/consultingManagement' , \App\Http\Controllers\UserController::class . '@getViewOfConsulManager');
Route::post('/saveDataOfConsultingManaging' , \App\Http\Controllers\UserController::class . '@SaveDataForConultingManaging');


Route::get('/registerIndicator' , function(){
    return view ('users_site.register');
})->name('register.user');
// Route::get('/userHome' , function(){
//     return view ('users_site.userHome');
// });
Route::get('/userForm' , \App\Http\Controllers\UserController::class . '@getFormPage');
Route::post('/userForm' , \App\Http\Controllers\UserController::class . '@sendMessageFromUserToAdmin')->name('user.message');
Route::get('/messageUserAdmin' , \App\Http\Controllers\UserController::class . '@messagesUserAdmin');
Route::get('/downloadImage/{id}' , \App\Http\Controllers\UserController::class . '@downloadImages');
Route::get('/showImage/{id}' , \App\Http\Controllers\UserController::class . '@ShowImages');

Route::get('/showImagesMessagesUser/{id}' , \App\Http\Controllers\InboxMessageUser::class . '@ShowImagesInMessages');
Route::get('/downloadImagsMessagesUser/{id}' , \App\Http\Controllers\InboxMessageUser::class . '@downloadImagesInMessages');
// Route::post('/StoreCourse' ,  \App\Http\Controllers\CourseController::class . '@storeCourseForUser')->name('courses.storeCourse');
// Route::get('/storeCourseUser' , \App\Http\Controllers\CourseController::class . '@getSubmitPage');
// Route::post('/storeCourseUser' ,  \App\Http\Controllers\CourseController::class . '@submitCourseForUser')->name('courses.storeUserCourse');
Route::get('/nmthgah' , \App\Http\Controllers\UserController::class . '@homePageView')->name('main.homePage');
Route::get('/showCourses/{id}' , \App\Http\Controllers\UserController::class . '@showCourses');
Route::post('/storeCourseForGuest' , \App\Http\Controllers\GuestController::class . '@storeCourseForGuest')->name('guest.store');
Route::get('/storeCourseGuest' , \App\Http\Controllers\GuestController::class . '@getSubmitPageForGuest');
Route::post('/storeCourseGuest' ,  \App\Http\Controllers\GuestController::class . '@submitCourseForGuest')->name('courses.storeUserCourse');
Route::get('/showImagePaidCourse/{id}' , \App\Http\Controllers\GuestController::class . '@ShowImageOfPaidCourse');

// Route::get('/logout' , function(){
//     Auth::guard()->logout();
//     Session::flush();
//     return redirect()->route('login');
// })->name('user.logout');

Route::prefix('manager')->group(function () {

    Route::get('/login' , \App\Http\Controllers\Auth\ProjectLoginController::class . '@showProjectLoginForm')->name('project.login');
    Route::post('/login' , \App\Http\Controllers\Auth\ProjectLoginController::class . '@login')->name('project.login.submit');
    Route::get('/' , \App\Http\Controllers\ProjectManagerController::class . '@index')->name('project.dashboard');
    
    Route::get('/logout' , \App\Http\Controllers\Auth\ProjectLoginController::class . '@logout')->name('project.logout');
    // Route::get('/logout' , function(){
    // Auth::guard('project')->logout();
    // Session::flush();
    // return redirect()->route('project.login');
    // })->name('project.logout');

});

Route::prefix('consultant')->group(function () {

    // Route::get('/login' , \App\Http\Controllers\Auth\ConsultantLoginController::class . '@showConsultantLoginForm')->name('consultant.login');
    Route::post('/login' , \App\Http\Controllers\Auth\ConsultantLoginController::class . '@login')->name('consultant.login.submit');
    Route::get('/' , \App\Http\Controllers\ConsultantManagerController::class . '@index')->name('consultant.dashboard');
    Route::get('/logout' , \App\Http\Controllers\Auth\ConsultantLoginController::class . '@logout')->name('consultant.logout');
    
    // Route::get('/logout' , function(){
    // Auth::guard('consultant')->logout();
    // Session::flush();
    // return redirect('/login');
    // })->name('consultant.logout');

});

Route::get('/request' , \App\Http\Controllers\RequestUserController::class . '@index')->name('request.index');
Route::get('/showFormRequest' , \App\Http\Controllers\RequestUserController::class . '@create');
Route::post('/request' , \App\Http\Controllers\RequestUserController::class . '@store')->name('request.store');
Route::get('/detailsProjectUser/{id}' , \App\Http\Controllers\RequestUserController::class . '@show')->name('request.show');
Route::get('/progressBarRequest/{request_id}' , \App\Http\Controllers\RequestUserController::class . '@progressStatusOfRequest');
Route::get('/downloadFinalResultForUserProject/{request_id}' , \App\Http\Controllers\RequestUserController::class . '@downloadResultsProject');
Route::get('/getResultsForPageUser/{request_id}/{projectos_id}' , \App\Http\Controllers\RequestUserController::class . '@getResultsForUsers');


// Route::get('/adminUserMessages/{id}' , \App\Http\Controllers\RequestUserController::class . '@showMessageForm')->name('request.showMessage');
Route::get('/adminUserMessages/{id2}' , \App\Http\Controllers\InboxMessageUser::class . '@index')->name('request.showMessage');
Route::post('/storeAdminUserMessages' , \App\Http\Controllers\InboxMessageUser::class . '@storeMessage')->name('request.storeMessageUser');
Route::post('/storeAdminUserMessagesFiles' , \App\Http\Controllers\InboxMessageUser::class . '@storeFiles')->name('request.storeMessageUserFiles');

Route::get('/showConsultantProject/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@showProjectConsultant')->name('consultant.showProject');

Route::get('/adminMessagesConsultant' , \App\Http\Controllers\ConsultantManagerController::class . '@showMessagesConslt')->name('consultant.showMessage');

Route::get('/showEvaluationPage/{id}/{id1}' , \App\Http\Controllers\ConsultantManagerController::class . '@showConsltPage');

Route::get('/getDataOfRequirementsWhenBackToPageAgain/{requirement_id}/{projectos_id}' , \App\Http\Controllers\ConsultantManagerController::class . '@getDataOfRequirements');

Route::post('/insertFilesConsultants' , \App\Http\Controllers\ConsultantManagerController::class . '@storeFilesConsultantToProject')->name('insertFilesConsultant');

Route::get('/downloadFilesConsultants/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@downloadFilesConsultant');

Route::get('/downloadFilesConsultants2/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@downloadFilesConsultant2');

Route::get('/downloadFilesConsultants3/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@downloadFilesConsultant3');

Route::get('/downloadAllFilesConsultant/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@downloadAllFiles');

Route::get('/showreConsultantProjectEvaluation/{id}' , \App\Http\Controllers\ConsultantManagerController::class . '@showreConsultantEvaluationProject');

Route::get('/downloadImageConsultant/{id}' , \App\Http\Controllers\InboxMessageConsultant::class . '@downloadImagesInMessagesConsultant');
Route::get('/showImageConsultant/{id}' , \App\Http\Controllers\InboxMessageConsultant::class . '@ShowImagesInMessagesConsultant');


Route::post('/GetToProjectResult/{request_id}/{projectos_id}' , \App\Http\Controllers\ConsultantManagerController::class . '@InsertRequirement')->name('postInProjectResult');
Route::get('/changeStatusRequest/{projectos_id}/{pillar_id}' , \App\Http\Controllers\ConsultantManagerController::class . '@changeStatusOfConsultantRequest');
//adminConultantMessages
Route::get('/adminConsultantMessages/{id1}/{id2}/{id3}' , \App\Http\Controllers\InboxMessageConsultant::class . '@indexConsultant')->name('consultantMsg.showMessage');
Route::post('/storeAdminConsultantMessages' , \App\Http\Controllers\InboxMessageConsultant::class . '@storeMessageConsultant')->name('consultMsgStore');
Route::post('/storeAdminConsultantMessagesFiles' , \App\Http\Controllers\InboxMessageConsultant::class . '@storeFilesConsultant')->name('consultMsgStoreFile');

Route::get('/showMainPageProjectManager/{id}/{id1}' , \App\Http\Controllers\ProjectManagerController::class . '@showProjectForManager')->name('project_manager.index');
Route::get('/pillarsProjectManager/{id}/{id1}' , \App\Http\Controllers\ProjectManagerController::class . '@showPillarsProjectManager');

Route::get('/showStandardPillars/{id1}/{id2}/{id3}', \App\Http\Controllers\ProjectManagerController::class . '@getStandardPillars');

Route::get('/getRequirementStandardPillar/{id1}/{id2}/{id3}' , \App\Http\Controllers\ProjectManagerController::class . '@getRequirementStandardPillars');

Route::get('/reEvaluationForPillar/{id1}/{id2}/{id3}' , \App\Http\Controllers\ProjectManagerController::class . '@getReEvaluationPillar');

Route::post('/reEvaluationForPillarPost' , \App\Http\Controllers\ProjectManagerController::class . '@FormRequestProjectConsult')->name('reEvalutionProjectConsultant');

Route::get('/filesProjectManager/{id1}/{id2}' , \App\Http\Controllers\ProjectManagerController::class . '@getFilesOfProject');

Route::get('/getFilesFromPillars/{id1}/{id2}' , \App\Http\Controllers\ProjectManagerController::class . '@getFilesFromPillars');

Route::get('/downloadFilesProjectManager/{id}' , \App\Http\Controllers\ProjectManagerController::class . '@downloadFilesManager');

Route::get('/downloadFilesProjectManager2/{id}' , \App\Http\Controllers\ProjectManagerController::class . '@downloadFilesFromConsultant');

Route::get('/getMessagesProjectConsultants/{id1}/{id2}/{id3}' , \App\Http\Controllers\ProjectManagerController::class . '@getMessagesProjectConsultant');

Route::post('/storeProjectToProjectMessage' , \App\Http\Controllers\ProjectManagerController::class . '@storeMessageProjectToConsultant')->name('ProjectConsulStoreMsg');
Route::post('/storeProjectToProjectFiles' , \App\Http\Controllers\ProjectManagerController::class . '@storeFilesProjectToConsultant')->name('ProjectConsulStoreFile');

Route::get('/downloadImageProjectManager/{id}' , \App\Http\Controllers\ProjectManagerController::class . '@downloadImagesInMessagesProjectManager');
Route::get('/showImageProjectManager/{id}' , \App\Http\Controllers\ProjectManagerController::class . '@ShowImagesInMessagesProjectManager');

Route::get('/downloadAllFilesPillarProjectManager/{request_id}/{pillar_id}' , \App\Http\Controllers\ProjectManagerController::class . '@downloadAllFilesProjectManager');

Route::get('/getMessagesAdminToProjectV/{id1}/{id2}/{id3}' , \App\Http\Controllers\ProjectManagerController::class . '@messangerBetweenProAdmin');

Route::get('/checkIfProjectCompletedOrNot/{projectos_id}/{request_id}' , \App\Http\Controllers\ProjectManagerController::class . '@checkIfCompletedProjectOrNot');

Route::post('/storeProjectToAdminMessage' , \App\Http\Controllers\ProjectManagerController::class . '@storeMessageProjectToAdmin')->name('ProjectStoreMsg');
Route::post('/storeProjectToAdminFiles' , \App\Http\Controllers\ProjectManagerController::class . '@storeFilesProjectToAdmin')->name('ProjectStoreFile');
