@extends('layout')

@section('title', 'IOM - Queue Management Settings')

@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Consultation Details</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Consultation Details</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Page content -->

<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration No</label>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control " >
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport No</label>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" class="form-control " >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">

                        <div class="row form-group">
                            <div class="col-md-6 form-group">
                                <p>Has the applicant (or their child) had any of the following symptoms in the last three months.</p>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        Yes
                                    </div>
                                    <div class="col-2 form-group">
                                        No
                                    </div>
                                    <div class="col-2 form-group">
                                        Unknown
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Cough</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Haemoptysis</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Night Sweats</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Weight Loss</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty5" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty5" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="ty5" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Fever</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <p>For children only, is there any history of the following,</p>
                                <div class="row form-group">
                                    <div class="col-md-2 form-group">
                                        Yes
                                    </div>
                                    <div class="col-md-2 form-group">
                                        No
                                    </div>
                                    <div class="col-md-2 form-group">
                                        Unknown
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Any chronic respiratory disease, such as cystic fibrosis</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Previous thoracic surgery</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Cyanosis</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyr4" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h4>Respiratory insufficient that limit activity</h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 form-group">
                                <p>For all applicants.</p>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        Yes
                                    </div>
                                    <div class="col-2 form-group">
                                        No
                                    </div>
                                    <div class="col-2 form-group">
                                        Unknown
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg1" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <h4>Is there any history of previous TB?</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg2" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <h4>Has anyone in the Household been diagnosed with TB in the past 2 years?</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2 form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" name="tyg3" data-fouc>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <h4>Is there any history recent contact with a case of active pulmonary TB (shared the same enclosed air space or household or other enclosed environment for prolonged period for days or weeks )?</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Examination Remarks</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <div class="col-md-12 form-group">
                                    <img class="img-thumbnail" style="width: 200px; height: 200px;" src="../assets/images/Lungs.png">
                                </div>
                                <div class="col-md-12 form-group">
                                    <img class="img-thumbnail" style="width: 200px; height: 200px;" src="../assets/images/xray.png">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-4">
                                        <label><b>Minor findings</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>1.1 Single fibrous streak/band/scar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>1.2 Bony islets</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.1 Pleural capping with a smooth inferior border(&lt;1cm thick at all points)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.2 Unilateral or bilateral costophrenic angle blunting (below the horizontal)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.3 calcified nodule(s) in the hilum/ mediastinum with no pulmonary granulomas</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label><b>Minor Finding(occasionally assoclated with TB infection)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.1 Solitary granuloma(&lt;1cm and of any lobe) with an unremarkable hilum</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.2 Solitary granuloma(&lt;1cm and of any lobe) with calcified/ enlarged hllar lymph nodes</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.3 Single/ Multiple calcified pulmonary nodules/micronodules with distinct borders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.4 Calcified pleural lesions</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.5 Costophrenic Angle blunting(either side above the horizontal)</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label><b>Findings sometines seen in active TB(or other conditions)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.0 Notable apical pleural capping(rough or rangged inferior borderand/or_&gt;1cm thick at any point)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.1 Aplcal fbronodualar/ fibrocalcific lesions or apical microcalcifications</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.2 Multiple/ single pulmonary nodules/ micronodules(noncalcified or poorly defined)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.3 Isolated hilar or mediastinal mass/lymphadenopathy(noncalcified)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.4 Single / Multiple pulmonary noduies/ masses _&gt;1cm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.5 Non-calcified pleural fibrosos and/ or effuslon</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.6 Interstltial fbrosos/parenchymal lung disease/ acute pulmoneary disease</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.7 Any cavitating lesion OR "lluffy" or "Soft" lesions felt likely to represent active TB</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-5">
                                        <label><b>Other findings (describr the abnormality in descriptlv findings/comments below)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>Skeleton and soft issue</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>cardiac or major vessels</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>lung fields</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>other</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;DPP'S Comment</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" data-fouc=""></span></div>
                                        <span>Order Sputum Sample</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Day #1</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Day #2</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Day #3</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
@endsection
