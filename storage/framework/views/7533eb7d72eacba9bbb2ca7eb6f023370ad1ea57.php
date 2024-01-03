<?php $__env->startSection('title', 'Counseling Settings'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('content'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Counseling Settings
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Counseling Settings</span>
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
                        <div class="col-md-12 form-group">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <h2><span class="badge badge-primary">Check List Items</span></h2>
                                    <div class="col form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label>Description</label>
                                                <input type="text" class="form-control" id="descriptionInput">
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addDescription" type="button"
                                                        class="btn btn-primary btn-sm"><span class="fa fa-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <table class="table table-bordered text-center">
                                            <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="CheckListItems">

                                            </tbody>
                                        </table>
                                    </div>


                                    <h2><span class="badge badge-dark">Main Display Messages</span></h2>
                                    <div class="col form-group">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label>Description</label>
                                                <input type="text" class="form-control" id="addMainDesplayInput">
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addMainDesplay" type="button"
                                                        class="btn btn-primary btn-sm"><span class="fa fa-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <table class="table table-bordered text-center">
                                            <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="MainDisplayMessages">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <h2><span class="badge badge-warning">Upload Recordings</span></h2>
                                    <div class="col form-group">
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <label>Language</label>
                                                <select class="form-control" id="UploadRecordingsLanguageInput">
                                                    <option>Select</option>
                                                    <option value="en">English</option>
                                                    <option value="fr">French</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                                <input type="text" class="form-control" name="DisplayDescriptionInput"
                                                       id="DisplayDescriptionInput">
                                            </div>
                                            <div class="col-md-3">
                                                <label>File</label>
                                                <input type="file" name="file" id="upload">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addRecordings"
                                                        class=" btn btn-primary btn-sm"><span class="fa fa-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <table class="table table-bordered text-center">
                                            <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Language</th>
                                                <th>Description</th>
                                                <th>Play Back</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="addTabeleData">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="col form-group">
                                            <label>Script Upload</label>
                                            <input type="file" id="fileOne">
                                            <div id="showFileOne"></div>
                                        </div>
                                        <div class="col form-group">
                                            <label>Instructions Upload</label>
                                            <input type="file" id="fileTwo">
                                            <div id="showFilTwo"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col text-center">
                                <button type="button" class="btn btn-success" id="csSave">Save</button>
                                <button type="button" class="btn btn-info" id="csClear">Clear</button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script>
        var path = '<?php echo e(url('/tempFileUpload')); ?>'
        var pathAudio = '<?php echo e(url('/tempFileUpload/')); ?>';

    </script>
    <script src="<?php echo e(asset('jsPages/CounselingSettings.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/CounselingSettings.blade.php ENDPATH**/ ?>