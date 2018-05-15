<?php

namespace App\Http\Controllers\Entity;


use App\Entity\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ClientController extends Controller
{
    public function index()
    {
        $client = Clients::find( 1 );
        return view( 'profile.client.index', ['client' => $client] );
    }

    public function edit($id)
    {
        $client = Clients::find( $id );
        return view( 'profile.client.edit', ['client' => $client] );
    }

    public function post_edit(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:25',
            'email' => 'required|email|max:25',
            'date_of_birth' => 'required',
            'address' => 'required|max:50',
            'province' => 'required',
            'country' => 'required',
            'contact_no' => 'required|numeric'
            //'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ] );

        $client = Clients::find( $request->input( 'clientId' ) );
        $client->user_name = $request->input( 'name' );
        $client->email = $request->input( 'email' );
        $client->date_of_birth = $request->input( 'date_of_birth' );
        $client->address = $request->input( 'address' );
        $client->province = $request->input( 'province' );
        $client->country = $request->input( 'country' );
        $client->contact_no = $request->input( 'contact_no' );

        if ($file = $request->hasFile( 'profile_image' )) {
            if ($client->profile_img_url != null) {
                $filetodelete = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $client->profile_img_url;
                \File::delete( $filetodelete );
            }
            $file = $request->file( 'profile_image' );
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile';
            $file->move( $destinationPath, $fileName );
            $client->profile_img_url = $fileName;
        }
        $client->save();
        return redirect()->route( 'client' );
    }
}