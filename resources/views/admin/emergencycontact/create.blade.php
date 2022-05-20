@extends('admin.layouts.app')
@section('title', 'Emergency Contact')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Emergency Contact</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('emergency-contact.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="name" placeholder="Enter Name"/>
                                                        <label class="label-error">{{ $errors->first('name') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="phone" placeholder="Enter Phone"/>
                                                        <label class="label-error">{{ $errors->first('phone') }}</label>
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
                                                        <input class="form-control" type="email" name="email" placeholder="Enter Email"/>
                                                        <label class="label-error">{{ $errors->first('email') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>GPS Pin</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="gps_pin" placeholder="Enter GPS Pin"/>
                                                        <label class="label-error">{{ $errors->first('gps_pin') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="address" placeholder="Enter address"/>
                                                        <label class="label-error">{{ $errors->first('address') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>Address Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea id="" cols="30" rows="5" class="form-control" name="adres_description" placeholder="Description"></textarea>
                                                        <label class="label-error">{{ $errors->first('adres_description') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <div class="submit-section pull-right">
                                                    <button class="btn btn-primary" type="submit">Save</button>
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