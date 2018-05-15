<?php
$subtotal = 0;
$tax = 0;
$total = 0;
define( "HST", "0.13" );
?>



<?php $__env->startSection('title', 'Invoice'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-6">
            <h2>Invoice</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Invoice</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                <a href="<?php echo e(route('orders')); ?>" class="btn btn-white"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back
                    to List</a>
                <a href="" id="btnPrint" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print
                    Invoice </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>From:</h5>
                            <address>
                                <strong><?php echo e($supplier->company_name); ?></strong><br>
                                <i class="fa fa-home"></i>
                                <?php echo e($supplier->address); ?><br>
                                <?php echo e($supplier->province); ?>, <?php echo e($supplier->country); ?><br>
                                <i class="fa fa-envelope m-r-xs"></i>
                                <a href="#"><?php echo e($supplier->email); ?></a><br>
                                <i class="fa fa-phone m-r-xs"></i>
                                <?php echo e($supplier->contact_no); ?>

                            </address>
                        </div>

                        <div class="col-sm-6 text-right">
                            <h4>Invoice No.</h4>
                            <h4 class="text-navy"><?php echo e($order[0]->reference_number); ?></h4>
                            <span>To:</span>
                            <address>
                                <strong><?php echo e($client->user_name); ?></strong><br>
                                <i class="fa fa-home"></i>
                                <?php echo e($client->address); ?><br>
                                <?php echo e($client->province); ?>, <?php echo e($client->country); ?><br>
                                <i class="fa fa-envelope m-r-xs"></i>
                                <a href="#"><?php echo e($client->email); ?></a><br>
                                <i class="fa fa-phone m-r-xs"></i>
                                <?php echo e($client->contact_no); ?>

                            </address>
                            <p>
                                <span><strong>Invoice Date:</strong> <?php echo e(date('M d, Y', strtotime($order[0]->created_at))); ?></span><br/>
                            </p>
                        </div>
                    </div>

                    <div class="table-responsive m-t">
                        <table class="table invoice-table">
                            <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td width="60%">
                                        <div><strong><?php echo e($od->item_id.' | '.$od->item->title); ?></strong></div>
                                        <small><?php echo e($od->item->description); ?></small>
                                    </td>
                                    <td width="10%" class="text-right"><?php echo e($od->quantity); ?></td>
                                    <td width="15%" class="text-right"><?php echo e('$'. $od->price); ?></td>
                                    <td width="15%" class="text-right"><?php echo e('$'. $od->quantity * $od->price); ?></td>
                                </tr>
                                <?php $subtotal += ($od->price * $od->quantity);?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td class="text-right">
                                <?php echo '$' . ($subtotal);?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>
                                <?php echo '$' . ($subtotal * HST);?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>
                                <?php echo '$' . ($subtotal + ($subtotal * HST))?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btnPrint').click(function () {
                window.print();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>