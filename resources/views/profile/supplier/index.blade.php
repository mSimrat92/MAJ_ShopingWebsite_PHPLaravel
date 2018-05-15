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
                            {{$supplier->user_name}}
                        </h2>
                        <small>Founder of {{$supplier->company_name}}</small>
                    </div>
                    <img src="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$supplier->profile_img_url) !!}"
                         class="img-circle circle-border m-b-md" width="140px" height="140px"
                         alt="profile">
                </div>
                <div class="widget-text-box">
                    <h4 class="media-heading">{{$supplier->company_name}}</h4>
                    <p>{{$supplier->description}}</p>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            {{$supplier->email}}
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            {{$supplier->address}}&nbsp;{{$supplier->province}}&nbsp;{{$supplier->country}}
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            {{$supplier->contact_no}}
                        </li>
                        <li>
                            <span class="fa fa-globe m-r-xs"></span>
                            <label>Website:</label>
                            <a href="{{$supplier->website_url}}" target="_blank">{{$supplier->website_url}}</a>

                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="{{route('supplier.edit',['id' => $supplier->id])}}" class="btn btn-xs btn-primary"><i
                                    class="fa fa-pencil"></i>
                            Edit Profile</a>
                    </div>
                </div>


            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
@endsection
