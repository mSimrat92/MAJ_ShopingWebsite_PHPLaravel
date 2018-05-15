<?php

namespace App\Http\Controllers\Entity;

use App\Entity\Suppliers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Suppliers::find( 1 );
        return view( 'profile.supplier.index', ['supplier' => $supplier] );
    }

    public function edit($id)
    {
        $supplier = Suppliers::find( $id );
        return view( 'profile.supplier.edit', ['supplier' => $supplier] );
    }

    public function post_edit(Request $request)
    {
        /*$count = count($request->file( 'profile_image' ));
        echo $count;

        foreach ($request->file( 'profile_image' ) as $photo) {
            $fileName = $photo->getClientOriginalName();
            echo $fileName;
        }*/

        $this->validate( $request, [
            'name' => 'required|max:25',
            'company_name' => 'required|max:25',
            'regisration_no' => 'required|max:25',
            'company_bio' => 'required|max:255',
            'email' => 'required|email|max:25',
            'address' => 'required|max:50',
            'province' => 'required',
            'country' => 'required',
            'contact_no' => 'required|numeric',
            'website_url' => 'required|url'
            //'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ] );

        $supplier = Suppliers::find( $request->input( 'supplierId' ) );
        $supplier->user_name = $request->input( 'name' );
        $supplier->company_name = $request->input( 'company_name' );
        $supplier->company_registration_no = $request->input( 'regisration_no' );
        $supplier->description = $request->input( 'company_bio' );
        $supplier->email = $request->input( 'email' );
        $supplier->address = $request->input( 'address' );
        $supplier->province = $request->input( 'province' );
        $supplier->country = $request->input( 'country' );
        $supplier->contact_no = $request->input( 'contact_no' );
        $supplier->website_url = $request->input( 'website_url' );

        if ($file = $request->hasFile( 'profile_image' )) {
            if ($supplier->profile_img_url != null) {
                $filetodelete = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $supplier->profile_img_url;
                \File::delete( $filetodelete );
            }
            $file = $request->file( 'profile_image' );
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile';
            $file->move( $destinationPath, $fileName );
            $supplier->profile_img_url = $fileName;
        }
        $supplier->save();
        return redirect()->route( 'supplier' );
    }
}