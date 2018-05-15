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
                            <?php echo e($supplier->user_name); ?>

                        </h2>
                        <small>Founder of <?php echo e($supplier->company_name); ?></small>
                    </div>
                    <img src="<?php echo asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$supplier->profile_img_url); ?>"
                         class="img-circle circle-border m-b-md" width="140px" height="140px"
                         alt="profile">
                </div>
                <div class="widget-text-box">
                    <h4 class="media-heading"><?php echo e($supplier->company_name); ?></h4>
                    <p><?php echo e($supplier->description); ?></p>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            <?php echo e($supplier->email); ?>

                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            <?php echo e($supplier->address); ?>&nbsp;<?php echo e($supplier->province); ?>&nbsp;<?php echo e($supplier->country); ?>

                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            <?php echo e($supplier->contact_no); ?>

                        </li>
                        <li>
                            <span class="fa fa-globe m-r-xs"></span>
                            <label>Website:</label>
                            <a href="<?php echo e($supplier->website_url); ?>" target="_blank"><?php echo e($supplier->website_url); ?></a>

                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="<?php echo e(route('supplier.edit',['id' => $supplier->id])); ?>" class="btn btn-xs btn-primary"><i
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