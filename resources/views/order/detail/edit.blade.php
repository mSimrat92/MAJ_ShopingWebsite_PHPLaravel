@extends('layouts.app')

@section('title', 'Order')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Order</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Order</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Order</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Orders List">
                            <a href="{{route('orders')}}">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('orders.edit.post')}}" autocomplete="off">
                            <input type="hidden" id="hidOrderId" name="orderId" value="{{$order->id}}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlStatus">Status</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlStatus" name="status">
                                                @foreach ($status as $s)
                                                    <option value="{{$s->id}}" {{$order->status->id == $s->id ? "selected" : "" }}>{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="lblClient">Client</label>
                                        <div class="col-md-8">
                                            <a href="{{route('client')}}"
                                               class="text-navy">{{$order->clients->user_name}}</a>
                                            <ul class="list-unstyled m-t-md">
                                                <li>
                                                    <span class="fa fa-envelope m-r-xs"></span>
                                                    <label>Email:</label>
                                                    {{$order->clients->email}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-home m-r-xs"></span>
                                                    <label>Address:</label>
                                                    {{$order->clients->address}}&nbsp;{{$order->clients->province}}
                                                    &nbsp;{{$order->clients->country}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-phone m-r-xs"></span>
                                                    <label>Contact:</label>
                                                    {{$order->clients->contact_no}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Reference No</label>
                                        <div class="col-md-8">
                                            {{$order->reference_number}}
                                        </div>
                                    </div>
                                    @if ($order->updated_at !=null)
                                        <div class="form-group row">
                                            <label class="control-label col-md-4 text-right">Updated at</label>
                                            <div class="col-md-8">
                                                {{date('d-m-Y', strtotime($order->updated_at))}}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right">Created at</label>
                                        <div class="col-md-8">
                                            {{date('d-m-Y', strtotime($order->created_at))}}
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