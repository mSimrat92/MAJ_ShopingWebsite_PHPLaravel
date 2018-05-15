<?php

namespace App\Http\Controllers\Order;


use App\Order\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::all();
        return view( 'order.status.index', ['status' => $status] );
    }

    public function create()
    {
        return view( 'order.status.create' );
    }

    public function post_create(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:25|unique:statuses,name'
        ] );

        $status = new Status( [
            'name' => $request->input( 'name' ),
            'status_type' => $request->input( 'statustype' )
        ] );

        $status->save();
        return redirect()->route( 'status' );
    }

    public function edit($id)
    {
        $status = Status::find( $id );
        return view( 'order.status.edit', ['status' => $status] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:25'
        ] );

        $status = Status::find( $request->input( 'statusId' ) );
        $status->name = $request->input( 'name' );
        $status->status_type=$request->input('statustype');
        $status->save();
        return redirect()->route( 'status' );
    }

    public function delete($id)
    {
        $status = Status::find( $id );
        return view( 'order.status.delete', ['status' => $status] );
    }

    public function post_delete(Request $request)
    {
        $status = Status::find( $request->input( 'statusId' ) );
        $status->delete();
        return redirect()->route( 'status' );
    }
}