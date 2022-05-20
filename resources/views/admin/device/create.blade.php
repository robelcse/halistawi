@extends('admin.layouts.app')
@section('title', 'Add Device')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Device Information</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form id="regForm" action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- One "tab" for each step in the form: -->
                                        <div class="tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <label>Brand</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control input" value="{{old('brand')}}" type="text" name="brand" placeholder="Enter Brand" />
                                                            <label class="label-error">{{ $errors->first('brand') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <label>Model</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control input" value="{{old('model')}}" type="text" name="model" placeholder="Enter Model" />
                                                            <label class="label-error">{{ $errors->first('model') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <label>Series</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control input" value="{{old('series')}}" type="text" name="series" placeholder="Enter Series" />
                                                            <label class="label-error">{{ $errors->first('series') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Device Test Type</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            @php
                                                            $test_types = array_map('trim', old('test_type') ? old('test_type') : []);
                                                            @endphp
                                                            <div class="d-flex justify-content-between align-items-center flex_dir">
                                                                <span>
                                                                    <input type="checkbox" name="test_type[]" value="Weight" id="aa" {{ in_array('Weight', $test_types) ?  "checked" : "" }} class="input"><label for="aa" style="font-weight: 400;">Weight</label>
                                                                </span>
                                                                <span> <input type="checkbox" name="test_type[]" value="Height" id="ab" {{ in_array('Height', $test_types) ?  "checked" : "" }} class="input"><label for="ab" style="font-weight: 400;">Height</label></span>

                                                                <span>
                                                                    <input type="checkbox" name="test_type[]" value="Temprature" id="ac" {{ in_array('Temprature', $test_types) ?  "checked" : "" }} class="input"><label for="ac" style="font-weight: 400;">Temperature</label>
                                                                </span>
                                                                <span> <input type="checkbox" name="test_type[]" value="Blood pressure" id="ad" style="font-weight: 400;" {{ in_array('Blood pressure', $test_types) ?  "checked" : "" }} class="input"><label for="ad" style="font-weight: 400;">Blood Pressure</label></span>
                                                                <span> <input type="checkbox" name="test_type[]" value="Blood Oxygen" id="ae" {{ in_array('Blood Oxygen', $test_types) ?  "checked" : "ckd" }} class="input"><label for="ae" style="font-weight: 400;">Blood Oxygen</label></span>
                                                                <span><input type="checkbox" name="test_type[]" value="Blood Sugar" id="af" {{  (in_array('Blood Sugar', $test_types) ? ' checked' : '') }} class="input"><label for="af" style="font-weight: 400;">Blood Sugar</label></span>
                                                            </div>
                                                            <label class="label-error">{{ $errors->first('test_type') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <label>Description</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea cols="30" rows="5" class="form-control input" name="description" placeholder="Description">{{old('description')}}</textarea>
                                                            <label class="label-error">{{ $errors->first('description') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <label>Device Picture</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="file" name="device_pic">
                                                            <label class="label-error">{{ $errors->first('device_pic') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                            $hasCompanyError = false;
                                            if($errors->first('company_name') || $errors->first('company_c_12') || $errors->first('company_pin') || $errors->first('company_p_o_box') || $errors->first('company_city') || $errors->first('company_country') || $errors->first('company_sub_country') || $errors->first('company_gps_pin') ){
                                            $hasCompanyError = true;
                                            }

                                            $hasIndividualError = false;
                                            if($errors->first('individual_name') || $errors->first('gender') || $errors->first('individual_date_of_birth') || $errors->first('individual_national_id') || $errors->first('individual_city') || $errors->first('individual_country') || $errors->first('individual_sub_country') || $errors->first('individual_gps_pin') || $errors->first('individual_email') ){
                                            $hasIndividualError = true;
                                            }
                                            @endphp


                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-3 ">
                                                            <label>Device Owner</label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="d-flex justify-content-start align-items-center">
                                                                <input type="radio" id="halistaw" checked name="device_owner" @if(old('device_owner')=='halistaw' ) checked @endif value="halistaw"> &nbsp;<label for="halistaw">Halistaw</label> &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" id="other" name="device_owner" @if(old('device_owner')=='others' ) checked @endif value="others">&nbsp; <label for="other">Others</label>
                                                            </div>
                                                            <label class="label-error">{{ $errors->first('device_owner') }}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12" id="toggle-owner" @if(old('device_owner')=='others' || $hasCompanyError || $hasIndividualError || $errors->first('owner_type')) style='display:block!important' @endif>
                                                    <div class="row">
                                                        <div class="col-md-3 ">
                                                            <label>Owner Type</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex justify-content-start align-items-center">

                                                                <input type="radio" id="company" name="owner_type" @if(old('owner_type')=='company' ) checked @endif value="company"> &nbsp; <label for="company">Company</label> &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" id="individual" name="owner_type" @if(old('owner_type')=='individual' ) checked @endif value="individual">&nbsp; <label for="individual">individual</label>

                                                            </div>
                                                            <label class="label-error">{{ $errors->first('owner_type') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--parent of individual and company-->
                                            <div id="company_and_individual">
                                                <!--company information-->
                                                <div class="row" id="company_info" @if(old('owner_type')=='company' || $hasCompanyError) style='display:flex' @endif>
                                                    <div class="col-12">
                                                        <h4 style="font-size: 17px; line-height: 32px; font-weight: 500; margin-bottom: 25px; border-bottom: 1px solid #ccc;  padding-bottom: 15px; margin-top: 20px;">Company Information</h4>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="webshop-title">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>Name</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_name" placeholder="Enter name" value="{{old('company_name')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_name') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>C 12</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_c_12" placeholder="Enter C 12" value="{{old('company_c_12')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_c_12') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>PIN</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_pin" placeholder="Enter Pin" value="{{old('company_pin')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_pin') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="row mb-4">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>Pin Copy</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="file" name="company_pin_attachment" value="{{old('company_pin_attachment')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_pin_attachment') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h4 style="font-size: 20px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Address</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="col-md-3 mt-2">
                                                                            <label>County</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <select name="company_country" class="form-control" id="country">
                                                                                <option selected disabled value="0">Select County</option>
                                                                                @foreach($all_county as $county)
                                                                                <option value="{{ $county->name }}" @if(old('company_country')==$county->name) selected @endif data-id="{{$county->county_code}}">{{ $county->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label class="label-error">{{ $errors->first('company_country') }}</label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-md-4 mt-2">
                                                                            <label>Sub Country</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="company_sub_country" class="form-control" id="sub_country">
                                                                                <option selected disabled value="0">Select Sub County</option>
                                                                            </select>
                                                                            <label class="label-error">{{ $errors->first('company_sub_country') }}</label>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>City</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <select name="company_city" class="form-control" id="words">
                                                                                <option selected disabled value="0">Select Words</option>
                                                                            </select>
                                                                            <label class="label-error">{{ $errors->first('company_city') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4">


                                                                <div class="col-lg-6">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>P.O Box</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_p_o_box" placeholder="Enter P.O Box" value="{{old('company_p_o_box')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_p_o_box') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>Location</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div id="map" style="display: none;"></div>
                                                                            <input class="form-control" type="text" name="company_gps_pin" id="pac-input" placeholder="Enter Location" value="{{old('company_gps_pin')}}" />
                                                                            <label class="label-error">{{ $errors->first('company_gps_pin') }}</label>
                                                                            <input type="hidden" id="company_gps" name="company_gps" value="{{old('company_gps')}}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h4 style="font-size: 20px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Contacts</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-md-6">
                                                                    <div class="row mb-4">
                                                                        <div class="col-md-2">
                                                                            <label>Phone</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_phone" placeholder="Phone" value="{{old('company_phone')}}">
                                                                            <label class="label-error">{{ $errors->first('company_phone') }}</label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row mb-4">
                                                                        <div class="col-md-2 mt-2">
                                                                            <label>Email</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" type="text" name="company_email" placeholder="Email" value="{{old('company_email')}}">
                                                                            <label class="label-error">{{ $errors->first('company_email') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//end company information-->

                                                <!--individual information-->
                                                <div class="row" id="individual_info" @if(old('owner_type')=='individual' || $hasIndividualError) style='display:flex' @endif>
                                                    <div class="col-12">
                                                        <h4 style="font-size: 17px; line-height: 32px; font-weight: 500; margin-bottom: 25px; border-bottom: 1px solid #ccc;  padding-bottom: 15px; margin-top: 20px;">individual Information</h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>Name</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="individual_name" placeholder="Enter name" value="{{old('individual_name')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_name') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3 mt-2">
                                                                <label>Date of Birth</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="individual_date_of_birth" value="{{old('individual_date_of_birth')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_date_of_birth') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>ID</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="individual_national_id" placeholder="Enter id" value="{{old('individual_national_id')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_national_id') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>ID Copy</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="file" name="individual_national_id_attachment" value="{{old('individual_national_id_attachment')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_national_id_attachment') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>PIN</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" value="{{old('individual_pin')}}" type="text" name="individual_pin" placeholder="Enter Pin" />
                                                                <label class="label-error">{{ $errors->first('individual_pin') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-4">
                                                            <div class="col-md-2 mt-2">
                                                                <label>Pin Copy</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="file" name="individual_pin_attachemnt" value="{{old('individual_pin_attachemnt')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_pin_attachemnt') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="row mb-4">
                                                            <div class="col-md-1">
                                                                <label>Gender</label>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <input type="radio" name="gender" @if(old('gender')=='individual_male' ) checked @endif value="individual_male" id="male" /> <label for="male"> Male</label>
                                                                <input type="radio" name="gender" @if(old('gender')=='individual_female' ) checked @endif value="individual_female" id="female" /> <label for="female">Female</label>
                                                                <input type="radio" name="gender" @if(old('gender')=='individual_other' ) checked @endif value="individual_other" id="individual_other" /> <label for="individual_other">Other</label>
                                                                <label class="label-error">{{ $errors->first('gender') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h4 style="font-size: 20px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Address</h4>
                                                    </div>
                                                    <div class="col-12 mb-4">
                                                        <div class="row">


                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Country</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <select name="individual_country" class="form-control" id="ind_country">
                                                                            <option selected disabled value="0">Select County</option>
                                                                            @foreach($all_county as $county)
                                                                            <option value="{{ $county->name }}" @if(old('individual_country')==$county->name) selected @endif data-id="{{$county->county_code}}">{{ $county->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <label class="label-error">{{ $errors->first('individual_country') }}</label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-md-4 mt-2">
                                                                        <label>Sub Country</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select name="individual_sub_country" class="form-control" id="ind_sub_country">
                                                                            <option selected disabled value="0">Select Sub County</option>
                                                                        </select>
                                                                        <label class="label-error">{{ $errors->first('individual_sub_country') }}</label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-2 mt-2">
                                                                        <label>City</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <select name="individual_city" class="form-control" id="ind_words">
                                                                            <option selected disabled value="0">Select Words</option>
                                                                        </select>
                                                                        <label class="label-error">{{ $errors->first('individual_city') }}</label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>P.O Box</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="individual_p_o_box" placeholder="Enter P.O Box" value="{{old('individual_p_o_box')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_p_o_box') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2 mt-2">
                                                                <label>Location</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div id="map2" style="display: none;"></div>
                                                                <input class="form-control" type="text" name="individual_gps_pin" id="pac-input2" placeholder="Enter Location" value="{{old('individual_gps_pin')}}" />
                                                                <label class="label-error">{{ $errors->first('individual_gps_pin') }}</label>
                                                                <input type="hidden" id="individual_gps" name="individual_gps" value="{{old('individual_gps')}}" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <h4 style="font-size: 20px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Contacts</h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Phone</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="individual_phone" placeholder="Phone" value="{{old('individual_phone')}}">
                                                                <label class="label-error">{{ $errors->first('individual_phone') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-4">
                                                            <div class="col-md-2 mt-2">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="individual_email" placeholder="Email" value="{{old('individual_email')}}">
                                                                <label class="label-error">{{ $errors->first('individual_email') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//individual information-->
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="webshop-title">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 style="font-size: 17px; line-height: 32px; font-weight: 500; margin-bottom: 25px; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-top: 20px;">PbbAgent Information</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="webshop-title">

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-3">
                                                                            <label>Name</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input class="form-control input" type="text" name="pbbagent_name" placeholder="Enter name" value="{{old('pbbagent_name')}}" />
                                                                            <label class="label-error">{{ $errors->first('pbbagent_name') }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-3">
                                                                            <label>Pin</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input class="form-control input" type="text" name="pbbagent_pin" placeholder="pin" value="{{old('pbbagent_pin')}}">
                                                                            <label class="label-error">{{ $errors->first('pbbagent_pin') }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <div class="col-md-3">
                                                                            <label>Pin Copy</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input class="form-control" name="pin_attachment" type="file" value="{{old('pin_attachment')}}">
                                                                            <label class="label-error">{{ $errors->first('pin_attachment') }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-3">
                                                                            <label>C 12</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <input class="form-control" name="pbbagent_c_12" type="file" value="{{old('pbbagent_c_12')}}">
                                                                            <label class="label-error">{{ $errors->first('pbbagent_c_12') }}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-3">
                                                                            <label>Others Description</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <textarea class="form-control input" name="pbbagent_description" id="" cols="30" rows="4" placeholder="Description">{{old('pbbagent_description')}}</textarea>
                                                                            <label class="label-error">{{ $errors->first('pbbagent_description') }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 style="font-size: 17px; line-height: 32px; font-weight: 500; margin-bottom: 25px; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-top: 20px;">Emergency Contact</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="webshop-title">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Name</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control input" type="text" name="contact_name" placeholder="Enter Name" value="{{old('contact_name')}}" />
                                                                        <label class="label-error">{{ $errors->first('contact_name') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Phone</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control input" type="text" name="contact_phone" placeholder="Enter Phone" value="{{old('contact_phone')}}" />
                                                                        <label class="label-error">{{ $errors->first('contact_phone') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Email</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control input" type="email" name="contact_email" placeholder="Enter Email" value="{{old('contact_email')}}" />
                                                                        <label class="label-error">{{ $errors->first('contact_email') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Location</label>
                                                                    </div>
                                                                    <div class="col-md-9">

                                                                        <div id="map3" style="display: none;"></div>
                                                                        <input class="form-control input" type="text" name="contact_location" id="pac-input3" placeholder="Enter Location" value="{{old('contact_location')}}" />
                                                                        <label class="label-error">{{ $errors->first('contact_location') }}</label>
                                                                       <input type="hidden" id="contact_gps" name="contact_gps" value="{{old('contact_gps')}}"  />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Address</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control input" type="text" name="contact_address" placeholder="Enter address" value="{{old('contact_address')}}" />
                                                                        <label class="label-error">{{ $errors->first('contact_address') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-3 mt-2">
                                                                        <label>Address Description</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <textarea id="" cols="30" rows="5" class="form-control input" name="contact_adress_description" placeholder="Description">{{old('contact_adress_description')}}</textarea>
                                                                        <label class="label-error">{{ $errors->first('contact_adress_description') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 style="font-size: 17px; line-height: 32px; font-weight: 500; margin-bottom: 25px; border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-top: 20px;">Device Operations</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 style="font-size: 16px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Signup #1</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="webshop-title">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-md-6">
                                                                        <label>Start Date</label>
                                                                        <input class="form-control " type="date" name="start_date_1" placeholder="Enter Date" value="{{old('start_date_1')}}" />
                                                                        <label class="label-error">{{ $errors->first('start_date_1') }}</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>End Date</label>
                                                                        <input class="form-control " type="date" name="end_date_1" placeholder="Enter Date" value="{{old('end_date_1')}}" />
                                                                        <label class="label-error">{{ $errors->first('end_date_1') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 style="font-size: 16px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Signup #2</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="webshop-title">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-md-6">
                                                                        <label>Start Date</label>
                                                                        <input class="form-control " type="date" name="start_date_2" placeholder="Enter Date" value="{{old('start_date_2')}}" />
                                                                        <label class="label-error">{{ $errors->first('start_date_2') }}</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>End Date</label>
                                                                        <input class="form-control " type="date" name="end_date_2" placeholder="Enter Date" value="{{old('end_date_2')}}" />
                                                                        <label class="label-error">{{ $errors->first('end_date_2') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 style="font-size: 16px; line-height: 32px; font-weight: 500; margin-bottom: 25px;">Signup #3</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="webshop-title">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-md-6">
                                                                        <label>Start Date</label>
                                                                        <input class="form-control " type="date" name="start_date_3" placeholder="Enter Date" value="{{old('start_date_3')}}" />
                                                                        <label class="label-error">{{ $errors->first('start_date_3') }}</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>End Date</label>
                                                                        <input class="form-control " type="date" name="end_date_3" placeholder="Enter Date" value="{{old('end_date_3')}}" />
                                                                        <label class="label-error">{{ $errors->first('end_date_3') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="overflow:auto;">
                                            <div style="float:right;">
                                                <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                            </div>
                                        </div>
                                        <!-- Circles which indicates the steps of the form: -->
                                        <div style="text-align:center;margin-top:40px;">
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function $(selector) {
        return document.querySelector(selector)
    }

    //select device owner and get value
    let halistaw = $("#halistaw")
    halistaw.addEventListener("change", function(event) {

        let company = $("#company").checked = false;
        let individual = $("#individual").checked = false;

        deviceOwner(halistaw.value)
    })
    let other = $("#other")
    other.addEventListener("change", function(event) {

        let company = $("#company").checked = false;
        let individual = $("#individual").checked = false;

        deviceOwner(other.value)
    })

    //function call and pass value of device owner for conditionally render 
    function deviceOwner(dOwner) {
        if (dOwner == 'others') {
            $("#toggle-owner").style.display = 'block'
        }

        if (dOwner == 'halistaw') {

            $("#toggle-owner").style.display = 'none'
            $('#company_info').style.display = 'none'
            $('#individual_info').style.display = 'none'

        }
    }


    /*************************/


    /*************************/

    //select owner type and get value
    let company = $('#company')
    let individual = $('#individual')

    company.addEventListener("change", function() {
        ownerType(company.value)

        // let src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k&callback=callCompany&libraries=places&v=weekly&channel=2';

       // console.log(src)
    })

    individual.addEventListener("change", function() {
        ownerType(individual.value)

        // let src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k&callback=callIndividual&libraries=places&v=weekly&channel=2';

       // console.log(src)
    })

    //function call and pass owner value for conditionally render owner
    function ownerType(owner) {

        if (owner == 'company') {
            $('#individual_info').style.display = 'none'
            $('#company_info').style.display = 'flex'
        }
        if (owner == 'individual') {
            $('#company_info').style.display = 'none'
            $('#individual_info').style.display = 'flex'
        }
    }
</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByClassName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script>
    //var baseUrl = window.location.origin";
    var baseUrl = window.location.origin + "/hasli-stawi";
    //var baseUrl = window.location.origin + "/halistaw/hasli-stawi";
    window.addEventListener('DOMContentLoaded', (event) => {
        function $(selector) {
            return document.querySelector(selector)
        }
        let country = $('#country')
        let sub_county = $('#sub_country')
        let words = $('#words')


        country.addEventListener('change', function(event) {

            sub_county.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            countryId = country.options[country.selectedIndex].dataset.id;
            fetch(`${baseUrl}/tstation/sub-counties/${countryId}`)
                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        option.setAttribute('data-id', data.sub_county_code)
                        sub_county.append(option)
                    })
                });
        })


        sub_county.addEventListener('change', function(event) {

            subCountryCode = sub_county.options[sub_county.selectedIndex].dataset.id;

            words.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            fetch(`${baseUrl}/tstation/words/${subCountryCode}`)

                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        words.append(option)
                    })
                });
        })
    });


    window.addEventListener('DOMContentLoaded', (event) => {
        function $(selector) {
            return document.querySelector(selector)
        }
        let country = $('#ind_country')
        let sub_county = $('#ind_sub_country')
        let words = $('#ind_words')


        country.addEventListener('change', function(event) {

            sub_county.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            let countryId = country.options[country.selectedIndex].dataset.id;
            fetch(`${baseUrl}/tstation/sub-counties/${countryId}`)
                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        option.setAttribute('data-id', data.sub_county_code)
                        sub_county.append(option)
                    })
                });
        })


        sub_county.addEventListener('change', function(event) {

            subCountryCode = sub_county.options[sub_county.selectedIndex].dataset.id;

            words.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            fetch(`${baseUrl}/tstation/words/${subCountryCode}`)

                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        words.append(option)
                    })
                });
        })
    });
</script>
<!--==========script for API call=========-->
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k&callback=initMap&libraries=places&v=weekly&channel=2" async></script>

<script>
    function initMap() {

        Company();
        Individual();
        EmergencyContact();

    };

    function Company() {

        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -33.8688,
                lng: 151.2195
            },
            zoom: 13,
        });
        const input = document.getElementById("pac-input");
        const autocomplete = new google.maps.places.Autocomplete(input, {
            fields: ["place_id", "geometry", "formatted_address", "name"],
        });

        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        const marker = new google.maps.Marker({
            map: map
        });
        autocomplete.addListener("place_changed", () => {

            const place = autocomplete.getPlace();

            let placeId = place.place_id

            if (typeof place.formatted_address === 'undefined') {
                console.log('can not find location')
                document.getElementById('lattlang').value = ''
            } else {


                //after getting place id call api for get lattitute and langitute
                fetch(`https://maps.googleapis.com/maps/api/geocode/json?place_id=${placeId}&key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k`)
                    .then((response) => response.json())
                    .then((json) => {
                            let lattLang = json.results[0].geometry.location
                            let address = place.formatted_address
                            document.getElementById('company_gps').value = lattLang.lat + ' ,' + lattLang.lng

                            // console.log(address)
                            // console.log(lattLang)
                        }

                    );

            }

            if (!place.geometry || !place.geometry.location) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location,
            });
            marker.setVisible(true);
        });

    };


    function Individual() {

        const map = new google.maps.Map(document.getElementById("map2"), {
            center: {
                lat: -33.8688,
                lng: 151.2195
            },
            zoom: 13,
        });
        const input = document.getElementById("pac-input2");
        const autocomplete = new google.maps.places.Autocomplete(input, {
            fields: ["place_id", "geometry", "formatted_address", "name"],
        });

        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        const marker = new google.maps.Marker({
            map: map
        });
        autocomplete.addListener("place_changed", () => {

            const place = autocomplete.getPlace();

            let placeId = place.place_id

            if (typeof place.formatted_address === 'undefined') {
                console.log('can not find location')
                document.getElementById('lattlang').value = ''
            } else {


                //after getting place id call api for get lattitute and langitute
                fetch(`https://maps.googleapis.com/maps/api/geocode/json?place_id=${placeId}&key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k`)
                    .then((response) => response.json())
                    .then((json) => {
                            let lattLang = json.results[0].geometry.location
                            let address = place.formatted_address
                            document.getElementById('individual_gps').value = lattLang.lat + ' ,' + lattLang.lng

                            // console.log(address)
                            // console.log(lattLang)
                        }

                    );

            }

            if (!place.geometry || !place.geometry.location) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location,
            });
            marker.setVisible(true);
        });

    };

    function EmergencyContact() {

        const map = new google.maps.Map(document.getElementById("map3"), {
            center: {
                lat: -33.8688,
                lng: 151.2195
            },
            zoom: 13,
        });
        const input = document.getElementById("pac-input3");
        const autocomplete = new google.maps.places.Autocomplete(input, {
            fields: ["place_id", "geometry", "formatted_address", "name"],
        });

        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        const marker = new google.maps.Marker({
            map: map
        });
        autocomplete.addListener("place_changed", () => {

            const place = autocomplete.getPlace();

            let placeId = place.place_id

            if (typeof place.formatted_address === 'undefined') {
                console.log('can not find location')
                document.getElementById('lattlang').value = ''
            } else {


                //after getting place id call api for get lattitute and langitute
                fetch(`https://maps.googleapis.com/maps/api/geocode/json?place_id=${placeId}&key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k`)
                    .then((response) => response.json())
                    .then((json) => {
                            let lattLang = json.results[0].geometry.location
                            let address = place.formatted_address
                            document.getElementById('contact_gps').value = lattLang.lat + ' ,' + lattLang.lng

                            // console.log(address)
                            // console.log(lattLang)
                        }

                    );

            }

            if (!place.geometry || !place.geometry.location) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location,
            });
            marker.setVisible(true);
        });

    };
</script>

@endsection