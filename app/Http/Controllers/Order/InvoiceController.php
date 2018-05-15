<?php

namespace App\Http\Controllers\Order;


use App\Entity\Clients;
use App\Entity\Suppliers;
use App\Order\Order;
use App\Order\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function invoice($id)
    {

        $order = DB::table( 'orders' )
            ->select( 'orders.id', 'orders.reference_number', 'orders.clients_id', 'orders.total', 'orders.status_id', 'orders.created_at', 'orders.updated_at', 'order_details.suppliers_id' )
            ->join( 'order_details', 'orders.id', '=', 'order_details.order_id' )
            ->where( 'orders.id', $id )
            ->distinct()
            ->get();

        $client = Clients::find( $order[0]->clients_id );
        $supplier = Suppliers::find( $order[0]->suppliers_id );
        $orderDetails = OrderDetail::where( 'order_id', '=', $id )
            ->where( 'suppliers_id', '=', $order[0]->suppliers_id )->get();

        //var_dump( $order );
        //var_dump( $client );
        //var_dump( $supplier );
        //var_dump( $orderDetails );

        return view( 'order.invoice.index', ['order' => $order, 'client' => $client, 'supplier' => $supplier, 'orderDetails' => $orderDetails] );
    }

}