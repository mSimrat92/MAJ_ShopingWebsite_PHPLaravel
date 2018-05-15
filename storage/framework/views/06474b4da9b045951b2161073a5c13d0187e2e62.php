<?php $__env->startSection('title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Orders</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Orders</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Orders Details</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Orders List">
                            <a href="<?php echo e(route('orders')); ?>">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt>
                                    <dd><span class="label label-primary"
                                              style="font-size: 14px;"><?php echo e($order->status->name); ?></span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">
                                    <dt>Client:</dt>
                                    <dd><a href="<?php echo e(route('client')); ?>"
                                           class="text-navy font-bold"><?php echo e($order->clients->user_name); ?></a>
                                        <ul class="list-unstyled m-t-md">
                                            <li>
                                                <span class="fa fa-envelope m-r-xs"></span>
                                                <label>Email:</label>
                                                <?php echo e($order->clients->email); ?>

                                            </li>
                                            <li>
                                                <span class="fa fa-home m-r-xs"></span>
                                                <label>Address:</label>
                                                <?php echo e($order->clients->address); ?>&nbsp;<?php echo e($order->clients->province); ?>

                                                &nbsp;<?php echo e($order->clients->country); ?>

                                            </li>
                                            <li>
                                                <span class="fa fa-phone m-r-xs"></span>
                                                <label>Contact:</label>
                                                <?php echo e($order->clients->contact_no); ?>

                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-lg-7">
                                <dl class="dl-horizontal">
                                    <dt>Reference No:</dt>
                                    <dd><?php echo e($order->reference_number); ?></dd>
                                    <?php if($order->updated_at !=null): ?>
                                        <dt>Last Updated:</dt>
                                        <dd><?php echo e(date('d-m-Y', strtotime($order->updated_at))); ?></dd>
                                    <?php endif; ?>
                                    <dt>Created:</dt>
                                    <dd><?php echo e(date('d-m-Y', strtotime($order->created_at))); ?></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>List of Items</h5>
                                        <div class="ibox-tools">
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">

                                            <table class="table table-striped table-bordered table-hover"
                                                   id="dtOrderDetails">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td width="20%"><?php echo e($od->item_id.' | '.$od->item->title); ?></td>
                                                        <td width="20%"><?php echo e($od->quantity); ?></td>
                                                        <td width="20%" class="text-right"><?php echo e($od->price); ?></td>
                                                        <td width="20%"><?php echo e($od->status->name); ?></td>
                                                        <td width="20%"><a
                                                                    href="<?php echo e(route('orders.detail.edit',['id' => $od->id])); ?>"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i>&nbsp;Edit</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtOrderDetails').DataTable({
                //"ajax": ,
                "pageLength": 5,
                "responsive": true,
                "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [],
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>