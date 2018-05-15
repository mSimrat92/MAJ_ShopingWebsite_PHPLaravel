<?php

namespace App\Http\Controllers\Order;

use App\Entity\Clients;
use App\Entity\Suppliers;
use App\Order\Order;
use App\Order\OrderDetail;
use App\Order\Shipping;
use App\Order\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function ship($id)
    {
        $order = DB::table( 'orders' )
            ->select( 'orders.id', 'orders.reference_number', 'orders.clients_id', 'orders.total', 'orders.status_id', 'orders.created_at', 'orders.updated_at', 'order_details.suppliers_id' )
            ->join( 'order_details', 'orders.id', '=', 'order_details.order_id' )
            ->where( 'orders.id', $id )
            ->distinct()
            ->get();

        $client = Clients::find( $order[0]->clients_id );
        $supplier = Suppliers::find( $order[0]->suppliers_id );
        return view( 'order.shipment.ship', ['order' => $order, 'client' => $client, 'supplier' => $supplier] );
    }

    public function post_ship(Request $request)
    {
        $this->validate( $request, [
            'carrier' => 'required',
            'shipping_date' => 'required'
        ] );

        $shipping = new Shipping( [
            'order_id' => $request->input( 'orderId' ),
            'clients_id' => $request->input( 'clientId' ),
            'suppliers_id' => $request->input( 'supplierId' ),
            'shipping_date' => $request->input( 'shipping_date' ),
            'shipped_through' => $request->input( 'carrier' ),
            'shipping_refrence_no' => ShippingController::generateShippingReferenceNo()
        ] );

        $shipping->save();
        $inserted_shipping_id = $shipping->id;
        if ($inserted_shipping_id > 0) {

            //Get Status ID=
            $status = Status::where( 'name', '=', 'Shipped' )->get();
            //Update Order Table
            $order = Order::find( $request->input( 'orderId' ) );
            $order->status_id = $status[0]->id;
            $order->save();
            //Update order Details Table
            $orderDetail = OrderDetail::find( $request->input( 'orderId' ) );
            $orderDetail->status_id = $status[0]->id;
            $orderDetail->shipping_date = date( 'Y-m-d' );
            $orderDetail->save();
        }
        return redirect()->route( 'orders' );

    }

    private function generateShippingReferenceNo()
    {
        $refrence_number = null;
        $characters = array_merge( range( 'A', 'Z' ), range( 'a', 'z' ), range( '0', '9' ) );
        $max = count( $characters ) - 1;
        for ($i = 0; $i < 20; $i++) {
            $rand = mt_rand( 0, $max );
            $refrence_number .= $characters[$rand];
        }
        return strtoupper( $refrence_number );
    }

}