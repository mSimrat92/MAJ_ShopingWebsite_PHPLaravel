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
                            <a href="{{route('supplier')}}">Back to Profile</a>
                        </span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('errors.error')
                        <form method="post" action="{{route('supplier.edit.post')}}" autocomplete="off"
                              enctype="multipart/form-data">
                            <input type="hidden" id="hidSupplierId" name="supplierId" value="{{$supplier->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtUserName">Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtUserName" name="name"
                                                   value="{{$supplier->user_name}}"
                                                   placeholder="Name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtCompanyName">Company Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtCompanyName" name="company_name"
                                                   value="{{!is_null($supplier->company_name)?$supplier->company_name:""}}"
                                                   placeholder="Company Name"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtRegNo">Registration No</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtRegNo" name="regisration_no"
                                                   value="{{$supplier->company_registration_no}}"
                                                   placeholder="Registration No"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtDescription">Company
                                            Bio</label>
                                        <div class="col-md-8">
                                            <textarea id="txtDescription" name="company_bio" rows="4" cols="10"
                                                      placeholder="Company Bio"
                                                      class="form-control">{{$supplier->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtEmail">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtEmail" name="email" value="{{$supplier->email}}"
                                                   placeholder="Email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="txtAddress">Address</label>
                                        <div class="col-md-8">
                                            <textarea id="txtAddress" name="address" rows="4" cols="10"
                                                      placeholder="Address"
                                                      class="form-control">{{$supplier->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlProvince">Province</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlProvince" name="province">
                                                <option value="AB" {{$supplier->province =="AB"? "selected":""}}>AB
                                                </option>
                                                <option value="BC" {{$supplier->province =="AB"? "selected":""}}>BC
                                                </option>
                                                <option value="MB" {{$supplier->province =="MB"? "selected":""}}>MB
                                                </option>
                                                <option value="NB" {{$supplier->province =="NB"? "selected":""}}>NB
                                                </option>
                                                <option value="NL" {{$supplier->province =="NL"? "selected":""}}>NL
                                                </option>
                                                <option value="NS" {{$supplier->province =="NS"? "selected":""}}>NS
                                                </option>
                                                <option value="ON" {{$supplier->province =="ON"? "selected":""}}>ON
                                                </option>
                                                <option value="PE" {{$supplier->province =="PE"? "selected":""}}>PE
                                                </option>
                                                <option value="QC" {{$supplier->province =="QC"? "selected":""}}>QC
                                                </option>
                                                <option value="SK" {{$supplier->province =="SK"? "selected":""}}>SK
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right"
                                               for="ddlCountry">Country</label>
                                        <div class="col-md-8">
                                            <select class="chosen-select form-control" id="ddlCountry" name="country">
                                                <option value="Canada" {{$supplier->country =="Canada"? "selected":""}}>
                                                    Canada
                                                </option>
                                                <option value="US" {{$supplier->country =="US"? "selected":""}}>USA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtContactNo">Contact
                                            No</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtContactNo" name="contact_no"
                                                   value="{{$supplier->contact_no}}" maxlength="10"
                                                   placeholder="Contact No"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtUrl">Website
                                            URL</label>
                                        <div class="col-md-8">
                                            <input type="text" id="txtUrl" name="website_url"
                                                   value="{{$supplier->website_url}}"
                                                   placeholder="Website URL"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-4 text-right" for="txtFileUpload">Profile
                                            Image</label>
                                        <div class="col-md-8">
                                            <!--<input type="file" name="profile_image[]" class="form-control" multiple
                                                   id="profile_image">-->
                                            <input type="file" name="profile_image" class="form-control"
                                                   id="profile_image"><br>
                                            @if ($supplier->profile_img_url !=null)
                                                <div class="lightBoxGallery">
                                                    <a href="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$supplier->profile_img_url) !!}"
                                                       data-gallery=""><img
                                                                src="{!! asset('img'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$supplier->profile_img_url) !!}"
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