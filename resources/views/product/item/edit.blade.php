@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Product</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
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
                            <a href="{{route('product')}}">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('product.edit.post')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            <input type="hidden" id="hidProductId" name="productId"
                                   value="{{$product->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtTitle">Title</label>
                                        <div class="col-md-8">
                                            <textarea id="txtTitle" name="title"
                                                      placeholder="Title" rows="2"
                                                      cols="5" maxlength="100"
                                                      class="form-control">{{$product->title}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlCategory">Category</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlCategory" name="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{$product->category->id == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlSubCategory">Sub Category</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlSubCategory"
                                                    name="sub_category">
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}" {{$product->subcategory->id == $subcategory->id ? "selected" : "" }}>{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlBrand">Brand</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlBrand" name="brand">
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}" {{$product->brand->id == $brand->id ? "selected" : "" }}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDescription">Description</label>
                                        <div class="col-md-8">
                                            <textarea id="txtDescription" name="description"
                                                      placeholder="Description" rows="4" cols="5" maxlength="255"
                                                      class="form-control">{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtDetails">Details</label>
                                        <div class="col-md-8">
                                            <textarea id="txtDetails" name="details"
                                                      placeholder="Details" rows="4" cols="5" maxlength="255"
                                                      class="form-control">{{$product->details}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtQuantity">Quantity</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtQuantity" name="quantity"
                                                   value="{{$product->quantity}}" maxlength="3"
                                                   placeholder="Quantity"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtSellingPrice">Price</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtSellingPrice" name="price"
                                                   value="{{$product->selling_price}}"
                                                   placeholder="Price" maxlength="7"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDiscountPercentage">Discount
                                            Percentage</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtDiscountPercentage" name="discount_percentage"
                                                   value="{{$product->discount_percentage}}"
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
                                            @if (count($product->itemImages)>0)
                                                <br>
                                                <div class="lightBoxGallery">
                                                    @foreach ($product->itemImages as $image)
                                                        <a href="{!! asset('img'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$image->image_name) !!}"
                                                           data-gallery=""><img
                                                                    src="{!! asset('img'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$image->image_name) !!}"
                                                                    width="100px" height="100px" alt="Product Image"
                                                                    class="img-rounded img-responsive img-thumbnail"></a>
                                                    @endforeach
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


                                            @endif
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

                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.chosen-select').chosen({
                width: "100%",
                allow_single_deselect: true
            });
        });
    </script>
@endsection