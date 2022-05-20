@extends('admin.layouts.app')
@section('title', 'Update Company')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Update Company</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                <form action="{{ route('company.update', $company->company_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="name" value="{{ $company->name }}"/>
                                                        <label class="label-error">{{ $errors->first('name') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Cr-12</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="c_12" value="{{ $company->c_12 }}"/>
                                                        <label class="label-error">{{ $errors->first('c_12') }}</label>
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
                                                        <input class="form-control" type="password" name="pin" value="{{ $company->pin }}"/>
                                                        <label class="label-error">{{ $errors->first('pin') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row mb-4">
                                                <div class="col-md-2 mt-2">
                                                    <label>Pin Copy</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" name="pin_attachment" />
                                                    <label class="label-error">{{ $errors->first('pin_attachment') }}</label>
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
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>P.O Box</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="p_o_box" value="{{ $company->p_o_box }}"/>
                                                        <label class="label-error">{{ $errors->first('p_o_box') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>City</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="city" value="{{ $company->city }}"/>
                                                        <label class="label-error">{{ $errors->first('city') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Country</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="country" value="{{ $company->country }}"/>
                                                        <label class="label-error">{{ $errors->first('country') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Sub Country</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="sub_country" value="{{ $company->sub_country }}"/>
                                                        <label class="label-error">{{ $errors->first('sub_country') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>GPS pin</label>
                                                    </div> 
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="password" name="gps_pin" value="{{ $company->gps_pin }}"/>
                                                        <label class="label-error">{{ $errors->first('gps_pin') }}</label>
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
                                                        <input class="form-control" type="text" name="phone" value="{{ $company->phone }}" />
                                                        <label class="label-error">{{ $errors->first('phone') }}</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row mb-4">
                                                <div class="col-md-2 mt-2">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="email" value="{{ $company->email }}"/>
                                                    <label class="label-error">{{ $errors->first('email') }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <div class="submit-section pull-right">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
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