<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array 
     */
    protected $except = [
        'getHolidayCountApi',
        'checkLimitExceedingAppointment',
        'LoadTime',
        'LoadTimeAvailable',
        'InsertOnlineDataApi',
        'InsertMembersOnlineDataApi',
        'SendEmailsApi',
        'SendEmailsApiSave',
        'CheckPassportApi',
        'GeneratePDF',
        'GenerateSavedPDF',
        'HolidayCalenderLoadDataApi',
        'LoadCountryList',

        'SearchPassportNoWiseDetails',
        'UpdateOnlineDataApi',
        'UpdateOnlineRegDataMemApi',

        'VerifyApplicantApi',

        //=========================================================

        'ControlPanelLoginApi',
        'ControlPanelTabLoadApi',
        'TabCompleteApi',
        'TabLoadDescriptionApi',
		'CheckTabLoadApi',
		'CheckTabLoadApi_update',

		'RegistrationMainDisplayApi',
		'RegistrationMainDisplayApiAudio',
		'RegistrationMainDisplayApiAudio_Complete',

		'CounselingMainDisplayApi',
		'CounselingMainDisplayApiAudio',
		'CounselingMainDisplayApiAudio_Complete',

		'CXRMainDisplayApi',
		'CXRMainDisplayApiAudio',
		'CXRMainDisplayApiAudio_Complete',

		'SampleCollectionDisplayApi',
		'SampleCollectionMainDisplayApiAudio',
		'SampleCollectionDisplayApiAudio_Complete',

		'ConsultationMainDisplayApi',
		'ConsultationMainDisplayApiAudio',
		'ConsultationMainDisplayApiAudio_Complete',
        'LoadWebNotice'
    ];
}
