@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Orders</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
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
                            <a href="{{route('orders')}}">Back to list</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt>
                                    <dd><span class="label label-primary"
                                              style="font-size: 14px;">{{$order->status->name}}</span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">
                                    <dt>Client:</dt>
                                    <dd><a href="{{route('client')}}"
                                           class="text-navy font-bold">{{$order->clients->user_name}}</a>
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
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-lg-7">
                                <dl class="dl-horizontal">
                                    <dt>Reference No:</dt>
                                    <dd>{{$order->reference_number}}</dd>
                                    @if ($order->updated_at !=null)
                                        <dt>Last Updated:</dt>
                                        <dd>{{date('d-m-Y', strtotime($order->updated_at))}}</dd>
                                    @endif
                                    <dt>Created:</dt>
                                    <dd>{{date('d-m-Y', strtotime($order->created_at))}}</dd>
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
                                                @foreach ($orderDetails as $od)
                                                    <tr>
                                                        <td width="20%">{{ $od->item_id.' | '.$od->item->title }}</td>
                                                        <td width="20%">{{ $od->quantity }}</td>
                                                        <td width="20%" class="text-right">{{ $od->price }}</td>
                                                        <td width="20%">{{ $od->status->name }}</td>
                                                        <td width="20%"><a
                                                                    href="{{route('orders.detail.edit',['id' => $od->id])}}"><i
                                                                        class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i>&nbsp;Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
@endsection

@section('scripts')
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
@endsection
