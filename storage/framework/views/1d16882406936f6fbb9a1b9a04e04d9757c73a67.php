<?php $__env->startSection('title', 'Product'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Product</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Product</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Product</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Product List">
                            <a href="<?php echo e(route('product')); ?>">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo $__env->make('errors.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form method="post" action="<?php echo e(route('product.edit.post')); ?>" autocomplete="off"
                              enctype="multipart/form-data">
                            <input type="hidden" id="hidProductId" name="productId"
                                   value="<?php echo e($product->id); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtTitle">Title</label>
                                        <div class="col-md-8">
                                            <textarea id="txtTitle" name="title"
                                                      placeholder="Title" rows="2"
                                                      cols="5" maxlength="100"
                                                      class="form-control"><?php echo e($product->title); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlCategory">Category</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlCategory" name="category">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e($product->category->id == $category->id ? "selected" : ""); ?>><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlSubCategory">Sub Category</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlSubCategory"
                                                    name="sub_category">
                                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($subcategory->id); ?>" <?php echo e($product->subcategory->id == $subcategory->id ? "selected" : ""); ?>><?php echo e($subcategory->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlBrand">Brand</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlBrand" name="brand">
                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand->id); ?>" <?php echo e($product->brand->id == $brand->id ? "selected" : ""); ?>><?php echo e($brand->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDescription">Description</label>
                                        <div class="col-md-8">
                                            <textarea id="txtDescription" name="description"
                                                      placeholder="Description" rows="4" cols="5" maxlength="255"
                                                      class="form-control"><?php echo e($product->description); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtDetails">Details</label>
                                        <div class="col-md-8">
                                            <textarea id="txtDetails" name="details"
                                                      placeholder="Details" rows="4" cols="5" maxlength="255"
                                                      class="form-control"><?php echo e($product->details); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtQuantity">Quantity</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtQuantity" name="quantity"
                                                   value="<?php echo e($product->quantity); ?>" maxlength="3"
                                                   placeholder="Quantity"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtSellingPrice">Price</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtSellingPrice" name="price"
                                                   value="<?php echo e($product->selling_price); ?>"
                                                   placeholder="Price" maxlength="7"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDiscountPercentage">Discount
                                            Percentage</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtDiscountPercentage" name="discount_percentage"
                                                   value="<?php echo e($product->discount_percentage); ?>"
                                                   placeholder="Discount Percentage" maxlength="5"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtFileUpload">Product
                                            Images<br><span
                                                    class="text-info">(Can upload multiple image using Ctrl key)</span></label>
                                        <div class="col-md-8">
                                            <input type="file" name="product_image[]" class="form-control"
                                                   multiple="multiple"
                                                   id="product_image">
                                            <?php if(count($product->itemImages)>0): ?>
                                                <br>
                                                <div class="lightBoxGallery">
                                                    <?php $__currentLoopData = $product->itemImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo asset('img'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$image->image_name); ?>"
                                                           data-gallery=""><img
                                                                    src="<?php echo asset('img'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$image->image_name); ?>"
                                                                    width="100px" height="100px" alt="Product Image"
                                                                    class="img-rounded img-responsive img-thumbnail"></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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