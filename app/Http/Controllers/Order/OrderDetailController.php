<?php

namespace App\Http\Controllers\Order;


use App\Order\Order;
use App\Order\OrderDetail;
use App\Order\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{

    public function edit($id)
    {
        $orderdetail = OrderDetail::find( $id );
        $status = Status::where( 'status_type', '=', 'Order' )->get();
        return view( 'order.detail.editdetails', ['orderdetail' => $orderdetail, 'status' => $status] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'status' => 'required'
        ] );

        $orderDetail = OrderDetail::find( $request->input( 'orderdetailId' ) );
        $orderDetail->status_id = $request->input( 'status' );
        $orderDetail->save();
        return redirect()->route( 'orders.detail', ['id' => $orderDetail->order_id] );
    }
}