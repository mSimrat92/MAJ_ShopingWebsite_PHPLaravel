@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Profile</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="widget-head-color-box navy-bg p-lg text-center">
                    <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            {{$client->user_name}}
                        </h2>
                    </div>
                    <img src="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url) !!}"
                         class="img-circle circle-border m-b-md" width="140px" height="140px"
                         alt="profile">
                </div>
                <div class="widget-text-box">
                    <h4 class="media-heading">{{$client->user_name}}</h4>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            {{$client->email}}
                        </li>
                        <li>
                            <span class="fa fa-birthday-cake m-r-xs"></span>
                            <label>DOB:</label>
                            {{date('d-m-Y', strtotime($client->date_of_birth))}}
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            {{$client->address}}&nbsp;{{$client->province}}&nbsp;{{$client->country}}
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            {{$client->contact_no}}
                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="{{route('client.edit',['id' => $client->id])}}" class="btn btn-xs btn-primary"><i
                                    class="fa fa-pencil"></i>
                            Edit Profile</a>
                    </div>
                </div>


            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
@endsection
