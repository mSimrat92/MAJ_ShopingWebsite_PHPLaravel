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
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Profile</h5>
                        <div class="ibox-tools">
                        <span id="goBack" title="Click here to go back to Profile">
                            <a href="{{route('client')}}">Back to Profile</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('client.edit.post')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            <input type="hidden" id="hidClientId" name="clientId" value="{{$client->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtUserName">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtUserName" name="name"
                                                   value="{{$client->user_name}}"
                                                   placeholder="Name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtEmail">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtEmail" name="email" value="{{$client->email}}"
                                                   placeholder="Email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDob">Date of
                                            birth</label>
                                        <div class="col-md-8">
                                            <input type="date" id="txtDob" name="date_of_birth"
                                                   value="{{$client->date_of_birth}}"
                                                   placeholder="Date of birth"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtAddress">Address</label>
                                        <div class="col-md-8">
                                            <textarea id="txtAddress" name="address" rows="4" cols="10"
                                                      placeholder="Address"
                                                      class="form-control">{{$client->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlProvince">Province</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlProvince" name="province">
                                                <option value="AB" {{$client->province =="AB"? "selected":""}}>AB
                                                </option>
                                                <option value="BC" {{$client->province =="AB"? "selected":""}}>BC
                                                </option>
                                                <option value="MB" {{$client->province =="MB"? "selected":""}}>MB
                                                </option>
                                                <option value="NB" {{$client->province =="NB"? "selected":""}}>NB
                                                </option>
                                                <option value="NL" {{$client->province =="NL"? "selected":""}}>NL
                                                </option>
                                                <option value="NS" {{$client->province =="NS"? "selected":""}}>NS
                                                </option>
                                                <option value="ON" {{$client->province =="ON"? "selected":""}}>ON
                                                </option>
                                                <option value="PE" {{$client->province =="PE"? "selected":""}}>PE
                                                </option>
                                                <option value="QC" {{$client->province =="QC"? "selected":""}}>QC
                                                </option>
                                                <option value="SK" {{$client->province =="SK"? "selected":""}}>SK
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlCountry">Country</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlCountry" name="country">
                                                <option value="Canada" {{$client->country =="Canada"? "selected":""}}>
                                                    Canada
                                                </option>
                                                <option value="US" {{$client->country =="US"? "selected":""}}>USA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtContactNo">Contact
                                            No</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtContactNo" name="contact_no"
                                                   value="{{$client->contact_no}}" maxlength="10"
                                                   placeholder="Contact No"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtFileUpload">Profile
                                            Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="profile_image" class="form-control"
                                                   id="profile_image"><br>
                                            @if ($client->profile_img_url !=null)
                                                <div class="lightBoxGallery">
                                                    <a href="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url) !!}"
                                                       data-gallery=""><img
                                                                src="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$client->profile_img_url) !!}"
                                                                width="100px" height="100px" alt="Profile Image"
                                                                class="img-rounded img-responsive img-thumbnail"></a>
                                                    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                                                    <div id="blueimp-gallery" class="blueimp-gallery">
                                                        <div class="slides"></div>
                                                        <h3 class="title"></h3>
                                                        <a class="prev">‹</a>
                                                        <a class="next">›</a>
                                                        <a class="close">×</a>
                                                        <a class="play-pause"></a>
                                                        <ol class="indicator"></ol>
                                                    </div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-offset-4 col-md-8">
                                                <input type="submit" value="Update" name="update"
                                                       class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.chosen-select').chosen({
                width: "100%",
                allow_single_deselect: true
            });
        });
    </script>
@endsection