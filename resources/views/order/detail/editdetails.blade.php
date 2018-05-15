@extends('layouts.app')

@section('title', 'Order')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Order Detail</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
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
                            <a href="{{route('orders.detail', ['id'=>$orderdetail->order_id])}}">Back to details</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('orders.detail.edit.post')}}" autocomplete="off">
                            <input type="hidden" id="hidOrderDetailId" name="orderdetailId"
                                   value="{{$orderdetail->id}}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlStatus">Status</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlStatus" name="status">
                                                @foreach ($status as $s)
                                                    <option value="{{$s->id}}" {{$orderdetail->status->id == $s->id ? "selected" : "" }}>{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Product</label>
                                        <div class="col-md-8">
                                            {{$orderdetail->item->title}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Quantity</label>
                                        <div class="col-md-8">
                                            {{$orderdetail->quantity}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Price</label>
                                        <div class="col-md-8">
                                            {{$orderdetail->price}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    @if ($orderdetail->shipping_date ==null)
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Expected Shipping
                                                Date</label>
                                            <div class="col-md-8">
                                                {{date('d-m-Y', strtotime($orderdetail->expected_shipping_date))}}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($orderdetail->shipping_date !=null)
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Actual Shipping
                                                Date</label>
                                            <div class="col-md-8">
                                                {{date('d-m-Y', strtotime($orderdetail->shipping_date))}}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($orderdetail->updated_at !=null)
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Updated at</label>
                                            <div class="col-md-8">
                                                {{date('d-m-Y', strtotime($orderdetail->updated_at))}}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Created at</label>
                                        <div class="col-md-8">
                                            {{date('d-m-Y', strtotime($orderdetail->created_at))}}
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