<?php $__env->startSection('title', 'Appointment Cancel/Re Schedule'); ?>



<?php $__env->startSection('header'); ?>


    <div id="menucol" class="navbar navbar-dark navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded"
         style="z-index: 26;">
        <div class="navbar-brand wmin-0 mr-2" style="padding: 2px;">
            <a href="../pages/home.php" class="d-inline-block">
                <img src="../assets/images/logoTransparent2.png" alt="" style="height: 50px;">
            </a>
        </div>

        <div class="d-xl-none">
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
                    data-target="#navbar-navigation-icons" aria-expanded="false">
                <i class="icon-menu"></i>
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-navigation-icons" style="">
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a href="javascript:void(0);" class="navbar-nav-link legitRipple cd-nav-trigger">
                        <i class="icon-grid-alt"></i>
                        <span class="ml-2">Menu</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="icon-quill2"></i>
                        Color
                        <div class="legitRipple-ripple"
                             style="left: 76.9604%; top: 54.1667%; transform: translate3d(-50%, -50%, 0px); width: 213.25%; opacity: 0;"></div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-body p-2">
                            <div class="row no-gutters">
                                <div class="col-12 col-sm-4">
                                    <a href=""
                                       class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                       name="LimedSpruce" id="LimedSpruce">
                                        <i class="icon-snowflake icon-2x" style="color: #324148"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Limed
                                            Spruce
                                        </div>
                                    </a>


                                </div>

                                <div class="col-12 col-sm-4">
                                    <a href=""
                                       class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                       name="JungleGreen" id="JungleGreen">
                                        <i class="icon-snowflake icon-2x" style="color: #26A69A"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Jungle
                                            Green
                                        </div>
                                    </a>

                                </div>

                                <div class="col-12 col-sm-4">
                                    <a href=""
                                       class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                       name="Cerulean" id="Cerulean">
                                        <i class="icon-snowflake icon-2x" style="color: #03A9F4"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Cerulean
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>

            <span class="ml-md-3 mr-md-auto"></span>

            <ul class="navbar-nav">

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                       data-toggle="dropdown">
                        <img src="../assets/images/user.jpg" class="rounded-circle mr-2" height="34" alt="">
                        <span>Dhakshitha Godakanda</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a class="dropdown-item logout"><i class="icon-switch2 logout"></i> Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>




    <title>IOM | Consultation</title>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Phlebotomy Result Approval
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Phlebotomy Result Approval
                </span>
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
                    <div class="card-header">


                        <div class="col">

                            <div class="row">
                                <div class="col-md-12 form-group table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-center"
                                           id="fultbl">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            
                                            <th style="width: 3%;">No</th>
                                            <th style="width: 20%;">Barcode</th>
                                            <th style="width: 20%;">HIV</th>
                                            <th style="width: 20%;">Filaria</th>
                                            <th style="width: 20%;">Malaria</th>
                                            <th style="width: 20%;">S.HCG</th>
                                            <th style="text-align: center;width: 2%;">

                                                <label class="form-check-label">
                                                    <input class="form-control userPerSelect cb-element"
                                                           name="tblchk" id="userPerSelectIdAll" type="checkbox">
                                                    <label for="userPerSelectIdAll"
                                                           style="padding: 7px 12px;"></label>
                                                </label>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="verifyStatTable" style="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-md-12 form-group text-center">
                        <button class="btn btn-lg btn-primary fa fa-cubes " id="btnDispatch">
                            &nbsp;&nbsp;&nbsp;Approval
                        </button>
                        </button>
                    </div>

                </div>
            </div>

        </div>


        <!------------------------->


    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/PhlebotomyResultAuthorize.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/PhlebotomyResultAuthorize.blade.php ENDPATH**/ ?>