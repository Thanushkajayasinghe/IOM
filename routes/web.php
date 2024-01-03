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


Route::get('/', "Auth\LoginController@ViewPage");


//-------------------------------------================ WebAPI ================----------------------------------

//=========================================================================

Route::post('getHolidayCountApi', 'WebApiController@getHolidayCountApi');

Route::post('checkLimitExceedingAppointment', 'WebApiController@checkLimitExceedingAppointment');

Route::post('LoadTime', 'WebApiController@LoadTime');

Route::post('LoadTimeAvailable', 'WebApiController@LoadTimeAvailable');

Route::post('InsertOnlineDataApi', 'WebApiController@InsertOnlineDataApi');

Route::post('InsertMembersOnlineDataApi', 'WebApiController@InsertMembersOnlineDataApi');

Route::post('SendEmailsApi', 'WebApiController@SendEmailsApi');

Route::post('SendEmailsApiSave', 'WebApiController@SendEmailsApiSave');

Route::post('CheckPassportApi', 'WebApiController@CheckPassportApi');

Route::post('GeneratePDF', 'WebApiController@GeneratePDF');

Route::post('GenerateSavedPDF', 'WebApiController@GenerateSavedPDF');

Route::post('HolidayCalenderLoadDataApi', 'WebApiController@HolidayCalenderLoadDataApi');

Route::post('LoadCountryList', 'WebApiController@LoadCountryList');

//=========================================================================

Route::post('SearchPassportNoWiseDetails', 'WebApiController@SearchPassportNoWiseDetails');

Route::post('UpdateOnlineDataApi', 'WebApiController@UpdateOnlineDataApi');

Route::post('UpdateOnlineRegDataMemApi', 'WebApiController@UpdateOnlineRegDataMemApi');

//=========================================================================

Route::post('VerifyApplicantApi', 'WebApiController@VerifyApplicantApi');

//=========================================================================

Route::post('ControlPanelLoginApi', 'WebApiController@ControlPanelLoginApi');

Route::post('ControlPanelTabLoadApi', 'WebApiController@ControlPanelTabLoadApi');

Route::post('TabCompleteApi', 'WebApiController@TabCompleteApi');

Route::post('TabLoadDescriptionApi', 'WebApiController@TabLoadDescriptionApi');

Route::post('CheckTabLoadApi', 'WebApiController@CheckTabLoadApi');

Route::post('CheckTabLoadApi_update', 'WebApiController@CheckTabLoadApi_update');

//-------------------------------------================ DisplayAPI ================----------------------------------

Route::post('RegistrationMainDisplayApi', 'DisplayApiController@RegistrationMainDisplayApi');

Route::post('RegistrationMainDisplayApiAudio', 'DisplayApiController@RegistrationMainDisplayApiAudio');

Route::post('RegistrationMainDisplayApiAudio_Complete', 'DisplayApiController@RegistrationMainDisplayApiAudio_Complete');

Route::post('CounselingMainDisplayApi', 'DisplayApiController@CounselingMainDisplayApi');

Route::post('CounselingMainDisplayApiAudio', 'DisplayApiController@CounselingMainDisplayApiAudio');

Route::post('CounselingMainDisplayApiAudio_Complete', 'DisplayApiController@CounselingMainDisplayApiAudio_Complete');

Route::post('CXRMainDisplayApi', 'DisplayApiController@CXRMainDisplayApi');

Route::post('CXRMainDisplayApiAudio', 'DisplayApiController@CXRMainDisplayApiAudio');

Route::post('CXRMainDisplayApiAudio_Complete', 'DisplayApiController@CXRMainDisplayApiAudio_Complete');

Route::post('SampleCollectionDisplayApi', 'DisplayApiController@SampleCollectionDisplayApi');

Route::post('SampleCollectionMainDisplayApiAudio', 'DisplayApiController@SampleCollectionMainDisplayApiAudio');

Route::post('SampleCollectionDisplayApiAudio_Complete', 'DisplayApiController@SampleCollectionDisplayApiAudio_Complete');

Route::post('ConsultationMainDisplayApi', 'DisplayApiController@ConsultationMainDisplayApi');

Route::post('ConsultationMainDisplayApiAudio', 'DisplayApiController@ConsultationMainDisplayApiAudio');

Route::post('ConsultationMainDisplayApiAudio_Complete', 'DisplayApiController@ConsultationMainDisplayApiAudio_Complete');

//====================================================================================================================

Route::group(['middleware' => 'disablepreventback'], function () {

    Auth::routes();
    Route::get('/home', 'HomeController@index');

    Route::get('/403Page', function () {
        return view('pages.403Page');
    });
    //Dashboard View
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });

    Route::get('/ApplicantOnSitePaymentReprint', function () {
        return view('pages.ApplicantOnSitePaymentReprint');
    });

    Route::get('/ViewHistory', function () {
        return view('pages.ViewHistory');
    });

    //Dashboard Load Data route
    Route::post('dashboardLoadData', 'dashboardController@LoadData');

    //Route for Set Work Schedule View
    Route::get('/InterpreterDateWiseDetails', "InterpreterDateWiseDetailsController@ViewPage")->middleware('CheckUserPermission');

    //InterpreterDateWiseDetails
    Route::post('/DateWiseDetailsAll', 'InterpreterDateWiseDetailsController@Search');

    //Route for Set Work Schedule View
    Route::get('/SetWorkSchedule', "SetWorkScheduleController@ViewPage")->middleware('CheckUserPermission');

    //Route for Set Work Schedule Insert or Update
    Route::post('SetWorkScheduleInsertOrUpdate', 'SetWorkScheduleController@InsertOrUpdate');

    //Route for Set Work Schedule Load Data
    Route::post('SetWorkScheduleLoadData', 'SetWorkScheduleController@LoadData');

    //Route for HolidayCalender Change Status Saturday 
    Route::post('HolidayCalenderChangeDateStat', 'SetWorkScheduleController@ChangeDateStatus');

    //Route for HolidayCalender Load Data
    Route::post('HolidayCalenderLoadData', 'SetWorkScheduleController@HolidayCalenderLoadData');

    //Route for Work Schedule disable for holidays
    Route::post('SetWorkScheduleDisableDates', 'SetWorkScheduleController@WorkScheduleDisableForHolidays');

    //Route for Over the phone disable for holidays
    Route::post('HolidayCalenderLoadDataForOverThePhone', 'OverThePhoneRegistrationController@Verify');

    //Over the phone Limit Tokens
    Route::post('OverThePhoneLimitToken', 'OverThePhoneRegistrationController@LimitToken');

    //LoadTimeOFTotal
    Route::post('LodeTimeOFTotal', 'OverThePhoneRegistrationController@TodayTimeBook');

    //Route for Master Settings
    Route::post('MasterSettings', 'SetWorkScheduleController@MasterSettings');

    //Route for Load Work Schedule Default Value from Master Settings
    Route::post('GetDefaultValueFromMasterSettings', 'SetWorkScheduleController@GetDefaultValueFromMasterSettings');

    //Route for Over The Phone Registration View
    Route::get('/OverThePhoneRegistration', "OverThePhoneRegistrationController@ViewPage")->middleware('CheckUserPermission');

    //Route for Over The Phone Registration View
    Route::get('/AppointmentCancelandReschedule', "AppointmentCancelAndRescheduleController@ViewPage")->middleware('CheckUserPermission');

    //Route for Verify Passport Appointment Cancel & Reschedule
    Route::post('AppointmentCancelAndReschedule', 'AppointmentCancelAndRescheduleController@Verify');

    //Route for AppointmentCancelAndReschedule Load Time
    Route::post('AppointmentCancelAndRescheduleLoadTime', 'AppointmentCancelAndRescheduleController@LoadTime');

    //Route for AppointmentCancelAndReschedule Save
    Route::post('AppointmentCancelAndRescheduleSave', 'AppointmentCancelAndRescheduleController@Save');

    //Route for AppointmentCancelAndReschedule Total Count for Members
    Route::post('AppointmentCancelAndRescheduleGetTotalMemberCount', 'AppointmentCancelAndRescheduleController@GetTotalMemberCount');

    //Route for AppointmentCancelAndReschedule Total Count for Members for Day
    Route::post('AppointmentCancelAndRescheduleGetTotalMemberCountForDay', 'AppointmentCancelAndRescheduleController@SetWorkScheduleDisableDates');

    //Route for CXR-External View
    Route::get('/CXRExternal', "CXRExternalController@ViewPage")->middleware('CheckUserPermission');

    //Route for CXR Main Display
    Route::get('/CXRMainDisplay', "DisplayController@ViewPageCXR");

    //Route for cxr Settings
    Route::post('CXREx', 'CXRExternalController@cxrsave');

    //Route for Database Table Empty View
    Route::get('/TableEmpty', "EmptyTableController@ViewPage")->middleware('CheckUserPermission');

    //Route Empty database query
    Route::post('TblEmty', 'EmptyTableController@Truncate');

    //Route for TB Test Result View
    Route::get('/TBTestResult', "TBTestResulrController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/TBformsave', "TBTestResulrController@saveData")->name('form_save');

    //Route for Malaria Test Result View
    Route::get('/MalariaTestResult', "MalariaTestResultController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/Malformsave', "MalariaTestResultController@saveData");

    //Route for Appointment Cancellation List View
    Route::get('/AppointmentCancellationList', "AppointmentCancellationListController@ViewPage")->middleware('CheckUserPermission');

    //ChangeUpdateAppointmentDetails
    Route::get('/ChangeUpdateAppointmentDetails', "ChangeUpdateAppointmentDetailsController@ViewPage")->middleware('CheckUserPermission');

    //Route for Appointment Cancellation List Load Table
    Route::post('AppointmentCancellationListLoadTable', 'AppointmentCancellationListController@LoadTable');

    //Route for Resident Visa Details From DIE View
    Route::get('/ResidentVisaDetailsFromDie', "ResidentVisaDetailsFromDieController@ViewPage")->middleware('CheckUserPermission');

    //Route for Floor Manager Change Process Order
    Route::get('/ChangeProcessOrder', "ChangeProcessOrderController@ViewPage")->middleware('CheckUserPermission');

    //Route for Change Process Order Insert
    Route::post('ChangeProcessOrderInsert', 'ChangeProcessOrderController@Insert');

    //Route for Change Process Order Load
    Route::post('ChangeProcessOrderLoad', 'ChangeProcessOrderController@Load');

    //Route for Resident Visa Details
    Route::post('ResidentVisaDetails', 'ResidentVisaDetailsFromDieController@ResidentVisaDetails');

    //Route for ReferToAFC
    Route::get('/RefferToAFC', "RefferToAFCController@ViewPage")->middleware('CheckUserPermission');

    //Route for Reffer To AFC Load Registration Number
    Route::post('RefferToAFCLoadRegistrationNumber', 'RefferToAFCController@LoadRegistrationNumber');

    //Route for Reffer To AFC Save
    Route::post('RefferToAFCSave', 'RefferToAFCController@Save');

    //Route for Reffer To All Save
    Route::post('RefferToAllSave', 'RefferToAFCController@AllSave');

    //AppointmentCancelAndRescheduleLoadTime
    Route::post('OverThePhoneRegLoadTime', 'OverThePhoneRegistrationController@LoadTime');

    //AppointmentCancelAndRescheduleSave
    Route::post('AppointmentCancelAndReschedule3', 'OverThePhoneRegistrationController@Verify');

    //Route for Refer To Malaria View
    Route::get('/ReferToMalaria', "ReferToMalariaController@ViewPage")->middleware('CheckUserPermission');

    //Route for Reffer To Malaria Load Registration Number
    Route::post('ReferToMalariaLoadRegistrationNumber', 'ReferToMalariaController@LoadRegistrationNumber');

    //Route for Reffer To Malaria Save
    Route::post('ReferToMalariaSave', 'ReferToMalariaController@Save');

    //Route for Reffer To AFC Load Passport Number
    Route::post('RefferToAFCLoadPassportNumber', 'RefferToAFCController@LoadPassportNumber');

    //Route for ReferToNSACP
    Route::get('/ReferToNSACPhivElisa', "ReferToNSACP@ViewPage")->middleware('CheckUserPermission');

    //Route for Reffer To Malaria All Funtions
    Route::post('ReferToNSACP', 'ReferToNSACP@AllFunReferToNSACP');

    //Over The Phone Registration LoadTime
    Route::post('OverThePhoneRegLoadTime', 'OverThePhoneRegistrationController@LoadTime');

    //Over The Phone Registration Verify
    Route::post('AppointmentCancelAndReschedule3', 'OverThePhoneRegistrationController@Verify');

    //Over The Phone Registration Save
    Route::post('SaveOnlineRegData', 'OverThePhoneRegistrationController@Insert');

    //ChangeUpdateAppointmentDetailsController
    //lodeAllMainApplicantAppoimentNumbers
    Route::get('/dropMainUserAppointmentNo', "ChangeUpdateAppointmentDetailsController@lodeAllMainApplicantAppoimentNumbers");

    //LodeDetailsAppnoWise
    Route::post('/SearchAppointmentNoWiseDetails', "ChangeUpdateAppointmentDetailsController@LodeDetailsAppnoWise");

    //ChangeUpdateAppointment
    Route::post('/UpdateOnlineRegData', 'ChangeUpdateAppointmentDetailsController@Update');

    //ChangeUpdateAppointmentMemberDetails
    Route::post('/UpdateOnlineRegDataMem', 'ChangeUpdateAppointmentDetailsController@UpdateOnlineRegDataMem');

    //Route for Refer To TB
    Route::get('/RefferToTB', "ReferToTBController@ViewPage")->middleware('CheckUserPermission');

    //Search Veryfy All
    Route::post('/VeryfyAllData', "SputumSampleDipatchToTbLabApprovelController@VeryfyAllData");

    //Route for Refer To Sputum Sample Dispatch To Tb Lab Approval View
    Route::get('/SputumSampleDipatchToTbLabApprovel', "SputumSampleDipatchToTbLabApprovelController@ViewPage")->middleware('CheckUserPermission');

    //ViewTBSputmSampleDetails
    Route::get('/ViewTBSputmSampleDetails', "ViewTBSputmSampleDetailsController@ViewPage")->middleware('CheckUserPermission');

    //Search recive All LabNo
    Route::post('/reciveAllLabNo', "ViewTBSputmSampleDetailsController@SearchLabNo");

    //Lab No Wise Search
    Route::post('/LabNoWiseSearch', "ViewTBSputmSampleDetailsController@SearchLabNoWise");

    //Route for Referral Approval IHU
    Route::post('ReferralApprovalIHU', 'ReferralApprovalIHUController@ReferralApprovalsIHU');

    //Route for Refer To TB
    Route::post('ReferToTB', 'ReferToTBController@AllFunReferToTB');

    //Route for Referral Approval view
    Route::get('/ReferralApproval', "ReferralApprovalController@ViewPage")->middleware('CheckUserPermission');

    //Route for IOM - RECOMMENDATION
    Route::get('/ihuRecommendation', "ihuRecommendationController@ViewPage")->middleware('CheckUserPermission');

    //Route for Referral Approval
    Route::post('ReferralApprovals', 'ReferralApprovalController@ReferralApprovals');

    //Route for Referral Approval IHU
    Route::get('/ReferralApprovalIHU', "ReferralApprovalIHUController@ViewPage")->middleware('CheckUserPermission');

    //Receive All Lab No
    Route::post('reciveAllLabNo', "ViewTBSputmSampleDetailsController@SearchLabNo");

    //Lab No vise Search
    Route::post('LabNoWiseSearch', "ViewTBSputmSampleDetailsController@SearchLabNoWise");

    //Route for Floor Manager View
    Route::get('/FloorManager', "FloorManagerController@ViewPage")->middleware('CheckUserPermission');

    //Route for Floor Manager Event
    Route::post('FloorManagerGetData', "FloorManagerController@FloorManagerGetData");

    //TB Sputum Receive
    Route::get('/TBSputumRecive', "TBSputumReciveController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/TBRecLoadData', "TBSputumReciveController@AllData");

    //Route of BloodSampleDispatchForMalaria
    Route::get('/BloodSampleDispatchForMalaria', "BloodSampleDispatchForMalariaController@ViewPage")->middleware('CheckUserPermission');

    //Call for BloodSampleDispatchForMalariaController
    Route::post('/BloodSampleDispatchForMalariaa', "BloodSampleDispatchForMalariaController@Process");

    //Route for Blood Sample Receive - Malaria
    Route::get('/BloodSampleReceiveMalaria', "BloodSampleReceiveMalariaController@ViewPage")->middleware('CheckUserPermission');

    //TB Sputum Dispatch to TB lab
    Route::get('/SputumSampleDipatchToTbLab', "SputumSampleDipatchToTbLabController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/TBSputumDispatchLoadData', "SputumSampleDipatchToTbLabController@AllData");

    //Route for Blood Sample Receive - Malaria All Functions
    Route::post('BloodSampleReceiveMalaria', 'BloodSampleReceiveMalariaController@AllFun');


    //Route for Cancel No Show Applicant
    Route::get('/CancelApplicants', "CancelNoShowApplicantsController@ViewPage")->middleware('CheckUserPermission');

    //Route for Cancel No Show Applicant All Functions
    Route::post('CancelNoShowApplicants', 'CancelNoShowApplicantsController@AllFun');

    //Route for ihuRecommendationControlle  process
    Route::post('ihuRecommendationprocess', 'ihuRecommendationController@process');

    //Route for RECOMMENDATION
    Route::get('/Recommendation', "RecommendationController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/RecommendationLoadData', "RecommendationController@AllData");

    //Test Pdf Generate
    Route::get('generateCounsellingLoadData-pdf', 'HomeController@generatePDF');

    //Route for Control Panel
    Route::get('/ControlPanel', "ControlPanelController@ViewPage")->middleware('CheckUserPermission');

    //Route for Control Panel All Functions
    Route::post('ControlPanel', 'ControlPanelController@AllFun');

    //sendEmail
    Route::post('sendEmails', 'sendEmail@sendEmailer');

    //Counseling TAB View
    Route::get('/CounsellingTab', function () {
        return view('pages.CounselingTAB');
    });

    //Counseling TAB Data load, Save
    Route::post('CounsellingTabLoadAllData', 'CounselingTABController@Alldata');

    //Web Cam Display Test
    Route::get('/zz', function () {
        return view('pages.ZTestPage');
    });
    //ihuRecommendationHistory
    Route::get('/ihuRecommendationHistory', "ihuRecommendationController@ViewPage2")->middleware('CheckUserPermission');

    Route::get('/Receipt', function () {
        return view('pages.Receipt');
    });

    Route::get('/generateReceipt', 'ApplicantOnSitePaymentController@generateReceipt');
    Route::post('generateReceipt', 'ApplicantOnSitePaymentController@generateReceipt');

    Route::get('/SummaryReport', function () {
        return view('pages.SummaryReport');
    });

    Route::get('/generateSummaryReport', 'ConsultationController@generateSummaryReport');
    Route::post('generateSummaryReport', 'ConsultationController@generateSummaryReport');

    Route::get('/Certificate', function () {
        return view('pages.Certificate');
    });

    Route::get('/generateCertificate', 'ConsultationController@generateCertificate');
    Route::post('generateCertificate', 'ConsultationController@generateCertificate');

    Route::get('generateCertificate2', 'ConsultationController@generateCertificate2');


    Route::get('/DetailCard', function () {
        return view('pages.DetailCard');
    });

    Route::get('/generateCard', 'ConsultationController@generateCard');
    Route::post('generateCard', 'ConsultationController@generateCard');

    //Web Cam Display Test
    Route::get('/PhlebotomyResultAuthorize', function () {
        return view('pages.PhlebotomyResultAuthorize');
    });
    Route::post('PhlResAproData', 'PhlebotomyResultAuthorizeController@alldata');

    Route::get('/PhlebotomySearch', function () {
        return view('pages.PhlebotomySearch');
    });

    Route::post('PhlebotomySearch', 'PhlebotomySampleCollectionController@Search');

    //User Signature
    Route::get('UserSignature', "UserSignatureController@ViewPage")->middleware('CheckUserPermission');
    Route::post('UserSignatureLoad', "UserSignatureController@AllData");

    //Appointment No Status
    Route::get('AppointmentNoStatus', function () {
        return view('pages.AppointmentNoStatus');
    });
    Route::post('AppointmentNoStatusLoadTable', 'AppointmentNoStatusController@loadTable');

    //ihuRecommendationUpdateProcess
    Route::post('ihuRecommendationUpdateProcess', 'ihuRecommendationUpdateController@process');

    //IHU reccomdation Update
    Route::get('/ihuRecommendationUpdate', "ihuRecommendationController@ViewPage3")->middleware('CheckUserPermission');

    //Payment Setting
    Route::get('/PaymentSetting', "PaymentSettingController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/PaymentSettingLoad', "PaymentSettingController@AllData");

    Route::get('/WeeklyData', function () {
        return view('pages.weeklydata');
    });

    //=====================================================================================================================
    //                                      - Niraj Yasitha is adding functions -
    //=====================================================================================================================

    //RadiologistReportingLoadData
    Route::post('RadiologistReportingLoadData', 'RadiologistReportingController@CRUD');

    //Route for Token Issue
    Route::get('/TokenIssue', "TokenIssueController@ViewPage")->middleware('CheckUserPermission');

    //Route for get the Token Number
    Route::post('TokenIssueLoadData', 'TokenIssueController@CRUD');

    //Route for get the Token Number
    Route::post('TokenIssueTokenAllocate', 'TokenIssueController@tokenAllocate'); //new code added on 22/02 by Niraj

    //Route for Queue Management Settings
    Route::get('/QueueManagementSettings', "QueueManagementSettingsController@ViewPage")->middleware('CheckUserPermission');

    //Route for Queue Management Settings; get the Token Number
    Route::post('QueueManagementSettingsSaveData', 'QueueManagementSettingsController@CUD');

    //Route for Counseling Settings
    Route::get('/CounselingSettings', "CounselingSettingsController@ViewPage")->middleware('CheckUserPermission');

    //Route for Counseling crud
    Route::post('CounselingSettingsCRUD', 'CounselingSettingsController@CRUD');

    //Route for Counseling crud
    Route::post('CounsellingDetailsLoadData', 'CounselingDetailsController@CRUD');

    //file upload
    //Route for get the Token Number
    Route::post('IOMFileupload', 'FileUploadController@store');

    //added by delain
    //Route for Registration Page
    Route::get('/Registration', "RegistrationController@ViewPage")->middleware('CheckUserPermission');
    Route::post('RegistrationLoadData', 'RegistrationController@CRUD');

    //Route for Counseling Page
    Route::get('/Counselling', "CounselingController@ViewPage")->middleware('CheckUserPermission');
    Route::post('CounsellingLoadData', 'CounselingController@CRUD');

    //Route for payment counter PageTokenIssueTokenAllocate
    Route::get('/ApplicantOnSitePayment', "ApplicantOnSitePaymentController@ViewPage")->middleware('CheckUserPermission');
    Route::post('PaymentLoadData', 'ApplicantOnSitePaymentController@CRUD');

    //Route for CXR internal Page
    Route::get('/CXRInternal', "CXRInternalController@ViewPage")->middleware('CheckUserPermission');
    Route::post('CXRLoadData', 'CXRInternalController@CRUD');

    //Route for consultation Page
    Route::get('/Consultation', "ConsultationController@ViewPage")->middleware('CheckUserPermission');
    Route::post('ConsultationLoadData', 'ConsultationController@CRUD');


    //Route for consultation Page
    Route::get('/CounsellingDetails', function () {
        return view('pages.CounsellingDetails');
    });

    //Route for SampleCollection Page
    Route::get('/SampleCollection', "SampleCollectionController@ViewPage")->middleware('CheckUserPermission');
    Route::post('SampleCollectionLoadData', 'SampleCollectionController@CRUD');

    //Route for PhlebotomySampleCollection Page
    Route::get('/PhlebotomySampleCollection', "PhlebotomySampleCollectionController@ViewPage")->middleware('CheckUserPermission');
    Route::post('PhlebotomyLoadData', 'PhlebotomySampleCollectionController@CRUD');

    //Route for Counselling Settings
    Route::get('/CounselingMainDisplay', "CounselingMainDisplayController@ViewPage");

    //Route for Registration Main Display
    Route::get('/RegistrationMainDisplay', "DisplayController@ViewPageRegister");

    Route::post('DisplayDataRead', 'DisplayController@Read');

    Route::get('/ConsultionMainDisplay', "DisplayController@ViewPageConsult");

    Route::get('/SampleCollectionDisplay', "DisplayController@ViewPage")->middleware('CheckUserPermission');

    //Route for Radiologits reporting Page
    Route::get('/RadiologistReporting', "RadiologistReportingController@ViewPage")->middleware('CheckUserPermission');
    Route::post('BloodSampleDispatchForMalaria', 'RadiologistReportingController@CRUD');
    Route::get('/RadiologistReportingPrevious', "RadiologistReportingController@ViewPagePrevious")->middleware('CheckUserPermission');
    Route::get('/RadiologistReportingCOM', "RadiologistReportingController@ViewPageCOM")->middleware('CheckUserPermission');

    //Route for Phlebotomy Rapid Test Results Page
    Route::get('/PhlebotomyRapidTestResults', "PhlebotomyRapidTestResultsController@ViewPage")->middleware('CheckUserPermission');
    Route::post('PhlebotomyRapidTestResultsLoadData', 'PhlebotomyRapidTestResultsController@CRUD');

    //DIE Report view
    Route::get('/DieReport', "RecommendationController@DIEViewPage")->middleware('CheckUserPermission');

    //Payment History
    Route::get('/PaymentHistory', function () {
        return view('pages.PaymentHistory');
    });

    Route::post('/LodePaymentHistory', "PaymentHistoryController@AllData");

    //Radiologist Reports View
    Route::get('/generatePdf', 'ReportRadiologistController@generatePDF');

    //Change Status
    Route::get('/ChangeStatus', "ChangeStatusController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/LoadChangeStatus', "ChangeStatusController@AllData");

    //DIE Report view
    Route::get('/DieReport', "RecommendationController@DIEViewPage")->middleware('CheckUserPermission');

    //DIE Report generate
    Route::get('dieReportGen', 'ConsultationController@dieReportGen');

    //TB Report view
    Route::get('/TBReport', "RecommendationController@TBViewPage")->middleware('CheckUserPermission');

    //Malaria Report view
    Route::get('/MalariaReport', "RecommendationController@MalariaViewPage")->middleware('CheckUserPermission');

    //HIV Report view
    Route::get('/HIVReport', "RecommendationController@HivViewPage")->middleware('CheckUserPermission');

    //HIV Report view
    Route::get('/FilariaReport', "RecommendationController@FilariaViewPage")->middleware('CheckUserPermission');

    // RePrint Report
    Route::get('/RePrintReport', "RePrintReportController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/LoadRePrintReports', "RePrintReportController@AllData");

    Route::post('deleteOnlineRegDataMem', 'ChangeUpdateAppointmentDetailsController@deleteOnlineRegDataMem');

    Route::get('/BarcodeListSummaryReport', function () {
        return view('pages.BarcodeListSummary');
    });

    //Route for IHU Report View
    Route::get('/IHUReport', "IHUReportController@ViewPage")->middleware('CheckUserPermission');
    Route::post('/IHUReportDataLoad', "IHUReportController@LoadData");

    //IHU Report generate
    Route::get('ihuReportGen', 'IHUReportController@ihuReportGen');

    Route::post('SendEmailsApiAppointmentCancel', "AppointmentCancelAndRescheduleController@SendEmailsApiAppointmentCancel");


    //-------------------------------------================ DisplayAPI ================----------------------------------

    Route::post('RegistrationMainDisplayApi', 'DisplayApiController@RegistrationMainDisplayApi');

    Route::post('CounselingMainDisplayApi', 'DisplayApiController@CounselingMainDisplayApi');

    Route::post('CXRMainDisplayApi', 'DisplayApiController@CXRMainDisplayApi');

    Route::post('SampleCollectionDisplayApi', 'DisplayApiController@SampleCollectionDisplayApi');

    Route::post('RegistrationMainDisplayApiAudio', 'DisplayApiController@RegistrationMainDisplayApiAudio');

    Route::post('RegistrationMainDisplayApiAudio_Complete', 'DisplayApiController@RegistrationMainDisplayApiAudio_Complete');

    Route::post('CounselingMainDisplayApiAudio', 'DisplayApiController@CounselingMainDisplayApiAudio');

    Route::post('CounselingMainDisplayApiAudio_Complete', 'DisplayApiController@CounselingMainDisplayApiAudio_Complete');

    Route::post('SendEmailsApi', 'WebApiController@SendEmailsApi');

    Route::post('AppointmentCancelAndRescheduleCancelled', 'AppointmentCancelAndRescheduleController@Cancelled');

    Route::post('ChangeMemberPhoto', "ChangeUpdateAppointmentDetailsController@ChangeMemberPhoto");

    //Route for Pending Token View
    Route::get('PendingTokens', "PendingTokenController@ViewPage")->middleware('CheckUserPermission');
    Route::post('pendingTokensLoad', "PendingTokenController@PendingTokensLoad");

    //Change Update Appointment Details Member Insert
    Route::post('InsertMembersData', 'ChangeUpdateAppointmentDetailsController@InsertMembersData');

    Route::post('MainMemberChange', "ChangeUpdateAppointmentDetailsController@MainMemberChange");

    //Radiologist Reports View
    Route::get('generatePdfRadiologistReporting', 'ReportRadiologistController@generatePDF');

    //Daily Applicant Details View
    Route::get('dailyApplicantDetails', "dailyApplicantDetailsController@Viewpage")->middleware('CheckUserPermission');

    //Daily Applicant Details Data Load
    Route::post('/dailyApplicantDetailsLoad', "dailyApplicantDetailsController@AllData");

    //Family Break Down View
    Route::get('FamilyBreakdown', "FamilyBreakdownController@Viewpage")->middleware('CheckUserPermission');

    //Load Family Appointment No
    Route::post('loadFamilyAppointmentNo', 'FamilyBreakdownController@loadFamilyAppointmentNo');

    //Load Family Members Appointment No
    Route::post('loadMemAppointmentNo', 'FamilyBreakdownController@loadMemAppointmentNo');

    //Separate Family on save
    Route::post('SeparateFamily', 'FamilyBreakdownController@SeparateFamily');

    //TB View
    Route::get('TBInter', "TBInterController@Viewpage")->middleware('CheckUserPermission');

    //TB Inter Save
    Route::post('TBInterSave', 'TBInterController@SaveRecords');

    //TB Inter Load data
    Route::post('TBInterLoadPrevData', 'TBInterController@LoadData');

    //Malaria View
    Route::get('MalariaInter', "MalariaInterController@Viewpage")->middleware('CheckUserPermission');

    //Malaria Inter Save
    Route::post('MalariaInterSave', 'MalariaInterController@SaveRecords');

    //Malaria Inter Load data
    Route::post('MalariaInterLoadPrevData', 'MalariaInterController@LoadData');

    //Filaria View
    Route::get('FilariaInter', "FilariaInterController@Viewpage")->middleware('CheckUserPermission');

    //Filaria Inter Save
    Route::post('FilariaInterSave', 'FilariaInterController@SaveRecords');

    //Filaria Inter Load data
    Route::post('FilariaInterLoadPrevData', 'FilariaInterController@LoadData');

    //HIV View
    Route::get('HIVInter', "HIVInterController@Viewpage")->middleware('CheckUserPermission');

    //HIV Inter Save
    Route::post('HIVInterSave', 'HIVInterController@SaveRecords');

    //HIV Inter Load data
    Route::post('HIVInterLoadPrevData', 'HIVInterController@LoadData');

    //DPP Result View
    Route::get('DPPResults', "DPPResultController@Viewpage")->middleware('CheckUserPermission');

    //Dpp Results Load data
    Route::post('dppresultload', 'DPPResultController@LoadData');

    //Dpp Results Click row Load data
    Route::post('dataLoadDppResults', 'DPPResultController@dataLoadDppResults');

    //Dpp Results Test Dismiss
    Route::post('testDismiss', 'DPPResultController@testDismiss');

    //TB Details View
    Route::get('TBViewDet', "TBInterController@Viewpage2")->middleware('CheckUserPermission');

    Route::post('tbViewDetPassportDrpLoad', 'TBInterController@passportLoadDrp');

    Route::post('tbViewDetAppointmentsDrpLoad', 'TBInterController@appointmentsLoadDrp');

    Route::post('tbViewDetLoadData', 'TBInterController@tbViewDetLoadData');

    //Filaria Details View
    Route::get('FilariaViewDet', "FilariaInterController@Viewpage2")->middleware('CheckUserPermission');

    Route::post('filariaViewDetPassportDrpLoad', 'FilariaInterController@passportLoadDrp');

    Route::post('filariaViewDetAppointmentsDrpLoad', 'FilariaInterController@appointmentsLoadDrp');

    Route::post('filariaViewDetLoadData', 'FilariaInterController@filariaViewDetLoadData');

    //Malaria Details View
    Route::get('MalariaViewDet', "MalariaInterController@Viewpage2")->middleware('CheckUserPermission');

    Route::post('malariaViewDetPassportDrpLoad', 'MalariaInterController@passportLoadDrp');

    Route::post('malariaViewDetAppointmentsDrpLoad', 'MalariaInterController@appointmentsLoadDrp');

    Route::post('malariaViewDetLoadData', 'MalariaInterController@malariaViewDetLoadData');

    //HIV Details View
    Route::get('HivViewDet', "HIVInterController@Viewpage2")->middleware('CheckUserPermission');

    Route::post('HivViewDetPassportDrpLoad', 'HIVInterController@passportLoadDrp');

    Route::post('HivViewDetAppointmentsDrpLoad', 'HIVInterController@appointmentsLoadDrp');

    Route::post('HivViewDetLoadData', 'HIVInterController@HivViewDetLoadData');

    //DIE Details View
    Route::get('DieViewDet', "DPPResultController@Viewpage2")->middleware('CheckUserPermission');

    Route::post('DIEViewDetPassportDrpLoad', 'DPPResultController@passportLoadDrp');

    Route::post('DIEViewDetAppointmentsDrpLoad', 'DPPResultController@appointmentsLoadDrp');

    Route::post('DIEViewDetLoadData', 'DPPResultController@DIEViewDetLoadData');


    Route::post('IHUReportSave', 'IHUReportController@SaveData');


    Route::get('SputumCollectionList', "SputumCollectionListController@Viewpage")->middleware('CheckUserPermission');
    Route::post('loadSputumCollectionList', 'SputumCollectionListController@loadSputumCollectionList');

    //TimeDifference
    Route::get('TokenAverageTime', "TimeDifferenceController@Viewpage2")->middleware('CheckUserPermission');
    //ViewTimeDifference
    Route::post('ViewTimeDifference', "TimeDifferenceController@ViewTimeDifference");
    //HIV Confirmatory Test Results
    Route::get('HIVConfirmatoryTestResults', "HIVConfirmatoryTestResultsController@Viewpage2")->middleware('CheckUserPermission');
    //HIV postive Member App No
    Route::post('HIVConfirmatoryTestResultsData', "HIVConfirmatoryTestResultsController@CRUD");

    Route::get('ApplicantWiseAuditTrail', "ApplicantWiseAuditTrailController@Viewpage")->middleware('CheckUserPermission');

    Route::post('ApplicantWiseAuditTrail', "ApplicantWiseAuditTrailController@loadData");

    Route::post('ApplicantWiseAuditTrailLoadAppNo', "ApplicantWiseAuditTrailController@loadDataAppNo");

    Route::get('generateReferralReport', 'ConsultationController@referTo');

    Route::get('generateOtherReferralReport', 'ConsultationController@referToOthers');

    Route::get('generateSystemLabRequest', 'ConsultationController@referSystemLabRequest');

    Route::post('manageworkschedule', 'ManageWorkScheduleController@InsertData');

    Route::post('savemanageworkscheduletime', 'ManageWorkScheduleController@savemanageworkscheduletime');

    Route::post('LoadTimeAvailableWorkSchedule', 'ManageWorkScheduleController@LoadTimeAvailable');

    Route::post('notAvailableDates', 'ManageWorkScheduleController@notAvailableDates');

    Route::post('removeClosedDayWorkSchedule', 'ManageWorkScheduleController@removeClosedDayWorkSchedule');

    //Route for Confirmatory Rapid Test Results Page
    Route::get('ConfirmatoryTestResults', "ConfirmatoryTestResultsController@ViewPage")->middleware('CheckUserPermission');
    Route::post('ConfirmatoryTestResultsLoadData', 'ConfirmatoryTestResultsController@CRUD');

    //BarcodeTestDetails view
    Route::get('BarcodeTestDetails', "BarcodeTestDetailsController@ViewPage")->middleware('CheckUserPermission');
    Route::post('LoadBarcodeTestDetails', 'BarcodeTestDetailsController@LoadBarcodeTestDetails');

    //DistributionByAgeReport view
    Route::get('DistributionByAgeReport', "DistributionByAgeReportController@ViewPage")->middleware('CheckUserPermission');
    Route::post('LoadAgeWiseDetails', 'DistributionByAgeReportController@LoadAgeWiseDetails');

    Route::post('SaveWebNotice', 'SetWorkScheduleController@SaveWebNotice');
    Route::post('LoadWebNotice', 'WebApiController@LoadWebNotice');

    Route::post('LoadWeekData', 'DistributionByAgeReportController@LoadWeekData');
    Route::post('UpdateRadiologyComments', 'RadiologistReportingController@UpdateRadiologyComments');
    Route::post('ConsultationLoadCurrentTokenNo', 'ConsultationController@ConsultationLoadCurrentTokenNo');
    Route::post('ConsultationCallNext', 'ConsultationController@ConsultationCallNext');
    Route::post('ConsultationLoadAppointmentNo', 'ConsultationController@ConsultationLoadAppointmentNo');
    Route::post('ConsultationLoadFormData', 'ConsultationController@ConsultationLoadFormData');
    Route::post('ConsultationLoadTestResults', 'ConsultationController@ConsultationLoadTestResults');
    Route::post('UpdateCommentConsultation', 'ConsultationController@UpdateCommentConsultation');


    Route::post('GetAppointmentNoFromPassport', 'ViewHistoryController@GetAppointmentNoFromPassport');






    //==========================  Mhac Web Routes  ============================================================
    //====================================================================================================================================

    //Registration Display
    Route::get('RegistrationDisplay/{floor}', function () {
        return view('pagesmhac.registrationdisplay');
    });
    //Vital Display
    Route::get('VitalDisplay/{floor}', function () {
        return view('pagesmhac.vitalsdisplay');
    });
    //Phlebotomy Display
    Route::get('PhlebotomyDisplay/{floor}', function () {
        return view('pagesmhac.phlebotomydisplay');
    });
    //CXR Display
    Route::get('CxrDisplay/{floor}', function () {
        return view('pagesmhac.cxrdisplay');
    });
    //Doctor Display
    Route::get('DoctorDisplay/{floor}', function () {
        return view('pagesmhac.doctordisplay');
    });


    //Make appointments
    Route::get('MakeAppointment/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.makeappointmentsau');
        } else if ($id == "UK") {
            return view('pagesmhac.makeappointmentsuk');
        } else if ($id == "CA") {
            return view('pagesmhac.makeappointmentsca');
        } else if ($id == "NZ") {
            return view('pagesmhac.makeappointmentsnz');
        } else if ($id == "OT") {
            return view('pagesmhac.makeappointmentsot');
        }
    });
    Route::get('MakeAppointmentLanding', "Mhac\MakeAppointmentController@ViewPageLanding")->middleware('CheckUserPermission');
    Route::post('SaveMakeAppointment', 'Mhac\MakeAppointmentController@SaveMakeAppointment');
    Route::post('LoadTimeAvailableMhac', 'Mhac\MakeAppointmentController@LoadTimeAvailableMhac');

    //Country
    Route::get('Country', "Mhac\CountryController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('Country', 'Mhac\CountryController@AllFun');

    //Token Issue
    Route::get('MhacTokenIssue', "Mhac\MhacTokenIssueController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('MhacTokenIssue', 'Mhac\MhacTokenIssueController@AllFun');

    //Cancel and Reshedule
    Route::get('CancelAndReshedule/{id}', function ($id) {
        return view('pagesmhac.cancelandreshedule');
    });
    Route::get('CancelAndResheduleLanding', "Mhac\CancelAndResheduleLandingController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('CancelAndResheduleLoadAppoimnet', 'Mhac\CancelAndResheduleController@loadAppointment');
    Route::post('CancelAndResheduleLoadPassport', 'Mhac\CancelAndResheduleController@loadPassport');
    Route::post('CancelAndResheduleVerify', 'Mhac\CancelAndResheduleController@Verify');
    Route::post('CancelAndResheduleLoadData', 'Mhac\CancelAndResheduleController@loadData');
    Route::post('CancelAndResheduleLoadTime', 'Mhac\CancelAndResheduleController@loadTime');
    Route::post('CancelAndSetReshedule', 'Mhac\CancelAndResheduleController@RescheduleAppointment');
    Route::post('CancelAndResheduleEmail', 'Mhac\CancelAndResheduleController@SendEmailsApi');
    Route::post('CancelAndResheduleSetCancel', 'Mhac\CancelAndResheduleController@Cancelled');
    Route::post('CancelAndResheduleCancelEmail', "Mhac\CancelAndResheduleController@SendEmailsApiAppointmentCancel");

    //Registation
    Route::get('MhacRegistration/{id}', function ($id) {
        return view('pagesmhac.mhacregistration');
    });
    Route::get('MhacRegistrationLanding', "Mhac\MhacRegistrationController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('PendingTokensURL', 'Mhac\MhacRegistrationController@PendingTokens');
    Route::post('NextURL', 'Mhac\MhacRegistrationController@Next');
    Route::post('LoadAppointmentNoURL', 'Mhac\MhacRegistrationController@LoadAppointmentNo');
    Route::post('LoadAppointmentNoDataURL', 'Mhac\MhacRegistrationController@LoadAppointmentNoData');
    Route::post('SaveURL', 'Mhac\MhacRegistrationController@Save');
    Route::post('CallAgainURL', 'Mhac\MhacRegistrationController@CallAgain');
    Route::post('CallAgainListURL', 'Mhac\MhacRegistrationController@CallAgainList');
    Route::post('CallAgainAppNoURL', 'Mhac\MhacRegistrationController@CallAgainAppNo');
    Route::post('CheckCallAgainAppNoURL', 'Mhac\MhacRegistrationController@CheckCallAgainAppNo');
    Route::post('LoadAppointmentNoURL2', 'Mhac\MhacRegistrationController@LoadAppointmentNo2');
    Route::post('NoShowURL', 'Mhac\MhacRegistrationController@NoSHOW');
    Route::post('CheckCallAgainAppNoUsingTokenURL', 'Mhac\MhacRegistrationController@CheckCallAgainAppNoUsingToken');

    //Vitals
    Route::get('Vitals/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.vitalsau');
        } else if ($id == "UK") {
            return view('pagesmhac.vitalsuk');
        } else if ($id == "CA") {
            return view('pagesmhac.vitalsca');
        } else if ($id == "NZ") {
            return view('pagesmhac.vitalsnz');
        } else if ($id == "OT") {
            return view('pagesmhac.vitalsot');
        }
    });
    Route::get('VitalsLanding', "Mhac\VitalsController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('VitalsLoadData', 'Mhac\VitalsController@CRUD');

    //CXR
    Route::get('CXR/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.cxrau');
        } else if ($id == "UK") {
            return view('pagesmhac.cxruk');
        } else if ($id == "CA") {
            return view('pagesmhac.cxrca');
        } else if ($id == "NZ") {
            return view('pagesmhac.cxrnz');
        } else if ($id == "OT") {
            return view('pagesmhac.cxrot');
        }
    });
    Route::get('CXRLanding', "Mhac\CXRController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('MhacCXRLoadData', 'Mhac\CXRController@CRUD');

    //Add Lab Test Results
    Route::get('AddLabTestResults', "Mhac\AddLabTestResultsController@ViewPage")->middleware('CheckUserPermission');
    Route::post('GetAvailbleTestsPhelabotomy', 'Mhac\AddLabTestResultsController@GetAvailbleTestsPhelabotomy');
    Route::post('SaveLabTestResults', 'Mhac\AddLabTestResultsController@SaveLabTestResults');

    //Approve Test Results
    Route::get('ApproveTestResults', "Mhac\ApproveTestResultsController@ViewPage")->middleware('CheckUserPermission');
    Route::post('LoadApproveDataLabTestReults', 'Mhac\ApproveTestResultsController@LoadApproveDataLabTestReults');
    Route::post('ApproveTestResultsAvailable', 'Mhac\ApproveTestResultsController@ApproveTestResultsAvailable');

    //Update Appointments
    Route::get('UpdateAppointment/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.updateappointmentdetailsau');
        } else if ($id == "UK") {
            return view('pagesmhac.updateappointmentdetailsuk');
        } else if ($id == "CA") {
            return view('pagesmhac.updateappointmentdetailsca');
        } else if ($id == "NZ") {
            return view('pagesmhac.updateappointmentdetailsnz');
        } else if ($id == "OT") {
            return view('pagesmhac.updateappointmentdetailsot');
        }
    });
    Route::get('UpdateAppointmentLanding', "Mhac\UpdateAppointmentController@ViewPageLanding")->middleware('CheckUserPermission');
    Route::get('dropUpdateMainUserAppointmentNoUK', "Mhac\UpdateAppointmentDetailsUKController@lodeAllMainApplicantAppoimentNumbers");
    Route::post('searchAppointmentNoWiseDetailsUK', "Mhac\UpdateAppointmentDetailsUKController@LodeDetailsAppnoWise");
    Route::post('SaveUpdateAppointmentUK', "Mhac\UpdateAppointmentDetailsUKController@Update");
    Route::get('dropUpdateMainUserAppointmentNoCA', "Mhac\UpdateAppointmentDetailsCAController@lodeAllMainApplicantAppoimentNumbers");
    Route::post('searchAppointmentNoWiseDetailsCA', "Mhac\UpdateAppointmentDetailsCAController@LodeDetailsAppnoWise");
    Route::post('SaveUpdateAppointmentCA', "Mhac\UpdateAppointmentDetailsCAController@Update");
    Route::get('dropUpdateMainUserAppointmentNoAU', "Mhac\UpdateAppointmentDetailsAUController@lodeAllMainApplicantAppoimentNumbers");
    Route::post('searchAppointmentNoWiseDetailsAU', "Mhac\UpdateAppointmentDetailsAUController@LodeDetailsAppnoWise");
    Route::post('SaveUpdateAppointmentAU', "Mhac\UpdateAppointmentDetailsAUController@Update");
    Route::get('dropUpdateMainUserAppointmentNoNZ', "Mhac\UpdateAppointmentDetailsNZController@lodeAllMainApplicantAppoimentNumbers");
    Route::post('searchAppointmentNoWiseDetailsNZ', "Mhac\UpdateAppointmentDetailsNZController@LodeDetailsAppnoWise");
    Route::post('SaveUpdateAppointmentNZ', "Mhac\UpdateAppointmentDetailsNZController@Update");
    Route::get('dropUpdateMainUserAppointmentNoOT', "Mhac\UpdateAppointmentDetailsOTController@lodeAllMainApplicantAppoimentNumbers");
    Route::post('searchAppointmentNoWiseDetailsOT', "Mhac\UpdateAppointmentDetailsOTController@LodeDetailsAppnoWise");
    Route::post('SaveUpdateAppointmentOT', "Mhac\UpdateAppointmentDetailsOTController@Update");

    //Phlebotomy    
    Route::get('Phlebotomy/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.phlebotomyau');
        } else if ($id == "UK") {
            return view('pagesmhac.phlebotomyuk');
        } else if ($id == "CA") {
            return view('pagesmhac.phlebotomyca');
        } else if ($id == "NZ") {
            return view('pagesmhac.phlebotomynz');
        } else if ($id == "OT") {
            return view('pagesmhac.phlebotomyot');
        }
    });
    Route::get('PhlebotomyLanding', "Mhac\PhlebotomyController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('MhacPhlebotomyLoadData', 'Mhac\PhlebotomyController@CRUD');

    //Payment Settings
    Route::post('/MhacPaymentSettingSaveURL', "PaymentSettingController@MhacPaymentSettingSave");
    Route::post('/PaymentSettingLoadMhacURL', "PaymentSettingController@MhacLoad");
    Route::post('/PaymentSettingUpdateURL', "PaymentSettingController@PaymentSettingUpdate");

    //PaymentCounter
    Route::get('PaymentCounter/{id}', function ($id) {
        return view('pagesmhac.paymentcounter');
    });
    Route::get('PaymentCounterLanding', "Mhac\PaymentCounterController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('VerifyURL', 'Mhac\PaymentCounterController@Verify');
    Route::post('SaveURLPaymentCounter', 'Mhac\PaymentCounterController@SavePaymentCounter');
    Route::get('generateReceiptPaymentCounter', 'Mhac\PaymentCounterController@generateReceiptPaymentCounter');

    //PaymentCounter - Reprint
    Route::get('PaymentCounterReprint/{id}', function ($id) {
        return view('pagesmhac.paymentcounterreprint');
    });
    Route::get('PaymentCounterReprintLanding', "Mhac\PaymentCounterReprintController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('ReprintVerifyURL', 'Mhac\PaymentCounterReprintController@ReprintVerify');
    Route::post('ReprintURLPaymentCounter', 'Mhac\PaymentCounterReprintController@Reprint');
    Route::get('reprintReceiptPaymentCounter', 'Mhac\PaymentCounterReprintController@reprintReceiptPaymentCounter');

    //User Audit log
    Route::get('UserAuditLog', "Mhac\UserAuditLogController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('LoadAuditLogData', "Mhac\UserAuditLogController@LoadAuditLogData");
    Route::post('LoadCurrentAuditLogData', "Mhac\UserAuditLogController@LoadCurrentAuditLogData");

    //Mhac Pending Tokens
    Route::get('MhacPendingTokens', "Mhac\MhacPendingTokensController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('LoadMhacPendingTokens', "Mhac\MhacPendingTokensController@LoadMhacPendingTokens");

    //MHAC Queue Update
    Route::get('MhacQueueUpdate', "Mhac\QueueUpdateController@ViewPage")->middleware('CheckUserPermission');
    Route::post('LoadMhacQueueUpdateData', "Mhac\QueueUpdateController@LoadMhacQueueUpdateData");
    Route::post('UpdateStatusQueueUpdate', "Mhac\QueueUpdateController@UpdateStatusQueueUpdate");
    Route::post('LoadMhacQueueUpdateDataPerToken', "Mhac\QueueUpdateController@LoadMhacQueueUpdateDataPerToken");

    //Doctor page  
    Route::get('ConsultationMh/{id}', function ($id) {
        if ($id == "AU") {
            return view('pagesmhac.consultationmh');
        } else if ($id == "UK") {
            return view('pagesmhac.consultationmh');
        } else if ($id == "CA") {
            return view('pagesmhac.consultationmh');
        } else if ($id == "NZ") {
            return view('pagesmhac.consultationmh');
        } else if ($id == "OT") {
            return view('pagesmhac.consultationmh');
        }
    });
    Route::get('ConsultationLanding', "Mhac\ConsultationLandingController@ViewPageLanding")->middleware('CheckUserPermission');
    Route::post('ConsultationLoadCurrentTokenNoMhack', 'Mhac\ConsultationController@ConsultationLoadCurrentTokenNo');
    Route::post('DoctorLoadData', 'Mhac\ConsultationController@CRUD');
    Route::get('/generateSummaryReportmhack', 'Mhac\ConsultationController@generateSummaryReport');
    Route::get('/generateCertificatemhac', 'Mhac\ConsultationController@generateCertificate');
    Route::get('/generateCertificatemhac2', 'Mhac\ConsultationController@generateCertificate2');

    //Appointment No Status
    Route::get('MhacAppointmentNoStatus', function () {
        return view('pagesmhac.mhacappointmentNoStatus');
    });
    Route::post('MhacAppointmentNoStatusLoadTable', 'Mhac\MhacAppNoStatusController@loadTable');

    //MHAC Payment History
    Route::get('MHACPaymentHistory', "Mhac\MhacPaymentHistoryController@ViewpageLanding")->middleware('CheckUserPermission');
    Route::post('LoadPaymentHistoryURL', 'Mhac\MhacPaymentHistoryController@LoadPaymentHistory');

});
