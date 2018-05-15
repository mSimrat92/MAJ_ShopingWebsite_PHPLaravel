<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Profile</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Profile</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Profile">
                            <a href="<?php echo e(route('client')); ?>">Back to Profile</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo $__env->make('errors.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form method="post" action="<?php echo e(route('client.edit.post')); ?>" autocomplete="off"
                              enctype="multipart/form-data">
                            <input type="hidden" id="hidClientId" name="clientId" value="<?php echo e($client->id); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtUserName">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtUserName" name="name"
                                                   value="<?php echo e($client->user_name); ?>"
                                                   placeholder="Name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtEmail">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtEmail" name="email" value="<?php echo e($client->email); ?>"
                                                   placeholder="Email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDob">Date of
                                            birth</label>
                                        <div class="col-md-8">
                                            <input type="date" id="txtDob" name="date_of_birth"
                                                   value="<?php echo e($client->date_of_birth); ?>"
                                                   placeholder="Date of birth"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtAddress">Address</label>
                                        <div class="col-md-8">
                                            <textarea id="txtAddress" name="address" rows="4" cols="10"
                                                      placeholder="Address"
                                                      class="form-control"><?php echo e($client->address); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlProvince">Province</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlProvince" name="province">
                                                <option value="AB" <?php echo e($client->province =="AB"? "selected":""); ?>>AB
                                                </option>
                                                <option value="BC" <?php echo e($client->province =="AB"? "selected":""); ?>>BC
                                                </option>
                                                <option value="MB" <?php echo e($client->province =="MB"? "selected":""); ?>>MB
                                                </option>
                                                <option value="NB" <?php echo e($client->province =="NB"? "selected":""); ?>>NB
                                                </option>
                                                <option value="NL" <?php echo e($client->province =="NL"? "selected":""); ?>>NL
                                                </option>
                                                <option value="NS" <?php echo e($client->province =="NS"? "selected":""); ?>>NS
                                                </option>
                                                <option value="ON" <?php echo e($client->province =="ON"? "selected":""); ?>>ON
                                                </option>
                                                <option value="PE" <?php echo e($client->province =="PE"? "selected":""); ?>>PE
                                                </option>
                                                <option value="QC" <?php echo e($client->province =="QC"? "selected":""); ?>>QC
                                                </option>
                                                <option value="SK" <?php echo e($client->province =="SK"? "selected":""); ?>>SK
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlCountry">Country</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlCountry" name="country">
                                                <option value="Canada" <?php echo e($client->country =="Canada"? "selected":""); ?>>
                                                    Canada
                                                </option>
                                                <option value="US" <?php echo e($client->country =="US"? "selected":""); ?>>USA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtContactNo">Contact
                                            No</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtContactNo" name="contact_no"
                                                   value="<?php echo e($client->contact_no); ?>" maxlength="10"
                                                   placeholder="Contact No"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtFileUpload">Profile
                                            Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="profile_image" class="form-control"
                                                   id="profile_image"><br>
                                            <?php if($client->profile_img_url !=null): ?>
                                                <div class="lightBoxGallery">
                                                    <a href="<?php echo asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url); ?>"
                                                       data-gallery=""><img
                                                                src="<?php echo asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url); ?>"
                                                                width="100px" height="100px" alt="Profile Image"
                                                                class="img-rounded img-responsive img-thumbnail"></a>
                                                    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                                                    <div id="blueimp-gallery" class="blueimp-gallery">
                                                        <div class="slides"></div>
                                                        <h3 class="title"></h3>
                                                        <a class="prev">‹</a>
                                                        <a class="next">›</a>
                                                        <a class="close">×</a>
                                                        <a class="play-pause"></a>
                                                        <ol class="indicator"></ol>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-offset-4 col-md-8">
                                                <input type="submit" value="Update" name="update"
                                                       class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.chosen-select').chosen({
                width: "100%",
                allow_single_deselect: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>