<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Category</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Category</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Delete Category</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Category List">
                            <a href="<?php echo e(route('category')); ?>">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo $__env->make('errors.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form method="post" action="<?php echo e(route('category.delete.post')); ?>" autocomplete="off">
                            <input type="hidden" id="hidCategoryId" name="categoryId" value="<?php echo e($category->id); ?>">
                            <div class="alert alert-danger" role="alert">
                                <h4>You are about to delete a master record do you wish to continue?</h4>
                                <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                            </div>
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>