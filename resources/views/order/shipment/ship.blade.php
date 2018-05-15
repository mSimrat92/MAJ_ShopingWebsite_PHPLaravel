@extends('layouts.app')

@section('title', 'Shipping')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Order</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Ship</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ship Order</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Product List">
                            <a href="{{route('orders')}}">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('orders.ship.post')}}" autocomplete="off">

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Order Summary</h5>
                                            <div class="ibox-tools">
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <dl class="dl-horizontal">
                                                        <dt>From:</dt>
                                                        <dd><a href="{{route('supplier')}}"
                                                               class="text-navy font-bold">{{$supplier->company_name}}</a>
                                                            <ul class="list-unstyled m-t-md">
                                                                <li>
                                                                    <span class="fa fa-envelope m-r-xs"></span>
                                                                    <label>Email:</label>
                                                                    {{$supplier->email}}
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-home m-r-xs"></span>
                                                                    <label>Address:</label>
                                                                    {{$supplier->address}}
                                                                    &nbsp;{{$supplier->province}}
                                                                    &nbsp;{{$supplier->country}}
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-phone m-r-xs"></span>
                                                                    <label>Contact:</label>
                                                                    {{$supplier->contact_no}}
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-lg-6">
                                                    <dl class="dl-horizontal">
                                                        <dt>To:</dt>
                                                        <dd><a href="{{route('client')}}"
                                                               class="text-navy font-bold">{{$client->user_name}}</a>
                                                            <ul class="list-unstyled m-t-md">
                                                                <li>
                                                                    <span class="fa fa-envelope m-r-xs"></span>
                                                                    <label>Email:</label>
                                                                    {{$client->email}}
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-home m-r-xs"></span>
                                                                    <label>Address:</label>
                                                                    {{$client->address}}&nbsp;{{$client->province}}
                                                                    &nbsp;{{$client->country}}
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-phone m-r-xs"></span>
                                                                    <label>Contact:</label>
                                                                    {{$client->contact_no}}
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <dl class="dl-horizontal">
                                                        <dt>Reference No:</dt>
                                                        <dd>{{$order[0]->reference_number}}</dd>
                                                        @if ($order[0]->updated_at !=null)
                                                            <dt>Last Updated:</dt>
                                                            <dd>{{date('d-m-Y', strtotime($order[0]->updated_at))}}</dd>
                                                        @endif
                                                        <dt>Created:</dt>
                                                        <dd>{{date('d-m-Y', strtotime($order[0]->created_at))}}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Shipping Info</h5>
                                            <div class="ibox-tools">
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <input type="hidden" id="hidOrderId" name="orderId"
                                                   value="{{$order[0]->id}}">
                                            <input type="hidden" id="hidClientId" name="clientId"
                                                   value="{{$order[0]->clients_id}}">
                                            <input type="hidden" id="hidSupplierId" name="supplierId"
                                                   value="{{$order[0]->suppliers_id}}">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4 text-right"
                                                               for="ddlCarrier">Carrier</label>
                                                        <div class="col-md-8">
                                                            <select class="chosen-select form-control" id="ddlCarrier"
                                                                    name="carrier">
                                                                <option value="UPS">UPS</option>
                                                                <option value="FEDEX">FedEx</option>
                                                                <option value="DHL">DHL</option>
                                                                <option value="DHL">Canada Post</option>
                                                                <option value="PUROLATOR">Purolator</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4 text-right"
                                                               for="txtShippingDate">Shipping Date</label>
                                                        <div class="col-md-8">
                                                            <input type="date" id="txtShippingDate" name="shipping_date"
                                                                   placeholder="Enter Shipping Date"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"></div>
                                            </div>
                                            <div class="clearfix">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-offset-4 col-md-8">
                                                            <input type="submit" value="Ship Order" name="ship" class="btn btn-primary"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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