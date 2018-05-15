<?php $__env->startSection('title', 'Order'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Order Detail</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Order Detail</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Order Detail</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Details">
                            <a href="<?php echo e(route('orders.detail', ['id'=>$orderdetail->order_id])); ?>">Back to details</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo $__env->make('errors.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form method="post" action="<?php echo e(route('orders.detail.edit.post')); ?>" autocomplete="off">
                            <input type="hidden" id="hidOrderDetailId" name="orderdetailId"
                                   value="<?php echo e($orderdetail->id); ?>">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlStatus">Status</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlStatus" name="status">
                                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($s->id); ?>" <?php echo e($orderdetail->status->id == $s->id ? "selected" : ""); ?>><?php echo e($s->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Product</label>
                                        <div class="col-md-8">
                                            <?php echo e($orderdetail->item->title); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Quantity</label>
                                        <div class="col-md-8">
                                            <?php echo e($orderdetail->quantity); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Price</label>
                                        <div class="col-md-8">
                                            <?php echo e($orderdetail->price); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <?php if($orderdetail->shipping_date ==null): ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Expected Shipping
                                                Date</label>
                                            <div class="col-md-8">
                                                <?php echo e(date('d-m-Y', strtotime($orderdetail->expected_shipping_date))); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($orderdetail->shipping_date !=null): ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Actual Shipping
                                                Date</label>
                                            <div class="col-md-8">
                                                <?php echo e(date('d-m-Y', strtotime($orderdetail->shipping_date))); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($orderdetail->updated_at !=null): ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Updated at</label>
                                            <div class="col-md-8">
                                                <?php echo e(date('d-m-Y', strtotime($orderdetail->updated_at))); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Created at</label>
                                        <div class="col-md-8">
                                            <?php echo e(date('d-m-Y', strtotime($orderdetail->created_at))); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <div class="col-md-offset-4 col-md-8">
                                            <input type="submit" value="Update" name="update" class="btn btn-primary"/>
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