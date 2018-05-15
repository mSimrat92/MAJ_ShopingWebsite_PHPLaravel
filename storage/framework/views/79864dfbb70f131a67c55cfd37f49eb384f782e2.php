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
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="widget-head-color-box navy-bg p-lg text-center">
                    <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            <?php echo e($client->user_name); ?>

                        </h2>
                    </div>
                    <img src="<?php echo asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url); ?>"
                         class="img-circle circle-border m-b-md" width="140px" height="140px"
                         alt="profile">
                </div>
                <div class="widget-text-box">
                    <h4 class="media-heading"><?php echo e($client->user_name); ?></h4>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            <?php echo e($client->email); ?>

                        </li>
                        <li>
                            <span class="fa fa-birthday-cake m-r-xs"></span>
                            <label>DOB:</label>
                            <?php echo e(date('d-m-Y', strtotime($client->date_of_birth))); ?>

                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            <?php echo e($client->address); ?>&nbsp;<?php echo e($client->province); ?>&nbsp;<?php echo e($client->country); ?>

                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            <?php echo e($client->contact_no); ?>

                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="<?php echo e(route('client.edit',['id' => $client->id])); ?>" class="btn btn-xs btn-primary"><i
                                    class="fa fa-pencil"></i>
                            Edit Profile</a>
                    </div>
                </div>


            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>