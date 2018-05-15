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
                        <h5>Orders Table</h5>
                        <div class="ibox-tools">
                        <!--<span id="createRecord" title="Click here to create new category">
                            <a href="{{route('subcategory.create')}}" class="text-primary create">Create New</a>
                        </span>-->
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover" id="dtOrders">
                                <thead>
                                <tr>
                                    <th>Reference No</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td width="25%">{{ $order->reference_number }}</td>
                                        <td width="25%">{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td width="25%">{{ $order->name }}</td>
                                        <td width="25%"><a href="{{route('orders.edit',['id' => $order->id])}}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</a>&nbsp;<strong>|</strong>&nbsp;<a
                                                    href="{{route('orders.detail',['id' => $order->id])}}"><i
                                                        class="fa fa-eye"
                                                        aria-hidden="true"></i>&nbsp;View</a>&nbsp;<strong>|</strong>&nbsp;<a
                                                    href="{{route('orders.ship',['id'=>$order->id])}}"><i
                                                        class="fa fa-truck"
                                                        aria-hidden="true"></i>&nbsp;Ship</a><strong>|</strong>&nbsp;<a
                                                    href="{{route('orders.invoice',['id' => $order->id])}}"><i
                                                        class="fa fa-files-o" aria-hidden="true"></i>&nbsp;Invoice</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reference No</th>
                                    <th>Date</th>
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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtOrders').DataTable({
                //"ajax": ,
                "pageLength": 5,
                "responsive": true,
                "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    {extend: 'copy'},
                    {extend: 'csv', title: 'Orders_File'},
                    {extend: 'excel', title: 'Orders_File'},
                    {extend: 'pdf', title: 'Orders_File'},
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ],
            });
        });
    </script>
@endsection
