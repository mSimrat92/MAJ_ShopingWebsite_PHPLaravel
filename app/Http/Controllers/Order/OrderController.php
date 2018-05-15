<?php

namespace App\Http\Controllers\Order;


use App\Order\Order;
use App\Order\OrderDetail;
use App\Order\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table( 'orders' )
            ->select( 'orders.id', 'orders.reference_number', 'orders.clients_id', 'orders.total', 'orders.status_id', 'orders.created_at', 'orders.updated_at', 'order_details.suppliers_id', 'statuses.name' )
            ->join( 'order_details', 'orders.id', '=', 'order_details.order_id' )
            ->join( 'statuses', 'orders.status_id', '=', 'statuses.id' )
            ->where( 'order_details.suppliers_id', 1 )
            ->distinct()
            ->get();
        //var_dump($orders);
        return view( 'order.detail.index', ['orders' => $orders] );
    }

    public function detail($id)
    {
        $order = Order::find( $id );
        $orderDetails = OrderDetail::where( 'order_id', '=', $id )
            //->where( 'quantity', '=', 3 )
            ->get();
        //var_dump('Order '.$order);
        //var_dump('Order Details '.$orderDetails);
        return view( 'order.detail.details', ['order' => $order, 'orderDetails' => $orderDetails] );
    }


    public function edit($id)
    {
        $order = Order::find( $id );
        $status = Status::where( 'status_type', '=', 'Order' )->get();
        return view( 'order.detail.edit', ['order' => $order, 'status' => $status] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'status' => 'required'
        ] );

        $order = Order::find( $request->input( 'orderId' ) );
        $order->status_id = $request->input( 'status' );
        $order->save();
        return redirect()->route( 'orders' );
    }
}