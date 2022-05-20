@extends('admin.layouts.app')
@section('title', 'Update Individual')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Update Individual</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('individual.update', $individual->individual_id) }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ $individual->name }}" />
                                                        <label class="label-error">{{ $errors->first('name') }}</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Date of Birth</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="date_of_birth" placeholder="Enter Cr-12" value="{{ $individual->date_of_birth }}" />
                                                        <label class="label-error">{{ $errors->first('date_of_birth') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>ID</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="national_id" placeholder="Enter Pin" value="{{ $individual->national_id }}" />
                                                        <label class="label-error">{{ $errors->first('national_id') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>ID Copy</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="national_id_attachemnt" placeholder="Enter ID" value="{{ $individual->national_id_attachemnt }}" />
                                                        <label class="label-error">{{ $errors->first('national_id_attachemnt') }}</label>
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
                                                        <input class="form-control" type="password" name="pin" placeholder="Enter Pin" value="{{ $individual->pin }}" />
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
                                                        <input class="form-control" type="file" name="pin_attachemnt" placeholder="c_12" value="{{ $individual->pin_attachemnt }}">
                                                        <label class="label-error">{{ $errors->first('pin_attachemnt') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-4">
                                                    <div class="col-md-2">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="radio" name="gender" value="male" {{ $individual->gender == 'male' ? 'checked':'' }} /> Male
                                                        <input type="radio" name="gender" value="female" {{ $individual->gender == 'female' ? 'checked':'' }} /> Female<br />
                                                        <label class="label-error">{{ $errors->first('gender') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
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
                                                        <input class="form-control" type="text" name="p_o_box" placeholder="Enter P.O Box" value="{{ $individual->p_o_box }}" />
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
                                                        <input class="form-control" type="text" name="city" placeholder="Enter City" value="{{ $individual->city }}" />
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
                                                        <input class="form-control" type="text" name="country" placeholder="Enter Country" value="{{ $individual->country }}" />
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
                                                        <input class="form-control" type="text" name="sub_country" placeholder="Enter Sub Country" value="{{ $individual->sub_country }}" />
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
                                                        <input class="form-control" type="password" name="gps_pin" placeholder="Enter GPS pin" value="{{ $individual->gps_pin }}" />
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
                                                        <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{ $individual->phone }}">
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
                                                        <input class="form-control" type="text" name="email" placeholder="Email" value="{{ $individual->email }}">
                                                        <label class="label-error">{{ $errors->first('email') }}</label>
                                                    </div>
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