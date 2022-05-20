@extends('admin.layouts.app')
@section('title', 'Create Ppbagent')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Create user</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter name" />
                                                <label class="label-error">{{ $errors->first('name') }}</label>
                                            </div>

                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="email" value="{{old('email')}}" placeholder="Enter email">
                                                <label class="label-error">{{ $errors->first('email') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>National ID</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="number" name="national_id" value="{{old('national_id')}}" placeholder="Enter NID">
                                                <label class="label-error">{{ $errors->first('national_id') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="mobile_number" value="{{old('mobile_number')}}" placeholder="Enter mobile">
                                                <label class="label-error">{{ $errors->first('mobile_number') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control input" type="date" name="date_of_birth" value="{{old('date_of_birth')}}" placeholder="Enter date of birth" />
                                                <label class="label-error">{{ $errors->first('date_of_birth') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="male" {{ old('gender') == 'male' ?'selected':'' }}>Male</option>
                                                    <option value="female" {{ old('gender') == 'female' ?'selected':'' }}>Female</option>
                                                    <option value="others" {{ old('gender') == 'others' ?'selected':'' }}>Others</option>
                                                </select>
                                                <span style="color:red">{{ $errors->first('gender') }}</span>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="role" id="role" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="admin" {{ old('role') == 'admin' ?'selected':'' }}>Admin</option>
                                                    <option value="doctor" {{ old('role') == 'doctor' ?'selected':'' }}>Doctor</option>
                                                    <option value="patient" {{ old('role') == 'patient' ?'selected':'' }}>Patient</option>
                                                </select>
                                                <span style="color:red">{{ $errors->first('role') }}</span>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Photo</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" name="photo" type="file">
                                                <label class="label-error">{{ $errors->first('photo') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                                <label class="label-error">{{ $errors->first('password') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Confirm Password</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                                                <label class="label-error">{{ $errors->first('password_confirmation') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="submit-section">
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