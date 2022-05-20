@extends('admin.layouts.app')
@section('title', 'Create Ppbagent')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Update user</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter name" />
                                                <label class="label-error">{{ $errors->first('name') }}</label>
                                            </div>

                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="Enter email">
                                                <label class="label-error">{{ $errors->first('email') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>National ID</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="national_id" value="{{ $user->national_id }}" placeholder="Enter NID">
                                                <label class="label-error">{{ $errors->first('national_id') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="mobile_number" value="{{ $user->mobile_number }}" placeholder="Enter mobile">
                                                <label class="label-error">{{ $errors->first('mobile_number') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control input" type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder="Enter date of birth" />
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
                                                    <option value="male" {{ $user->gender == 'male' ? 'selected':'' }}>Male</option>
                                                    <option value="female" {{ $user->gender == 'female' ? 'selected':'' }}>Female</option>
                                                    <option value="others" {{ $user->gender == 'others' ? 'selected':'' }}>Others</option>
                                                </select>
                                                <span style="color:red">{{ $errors->first('gender') }}</span>
                                            </div>
                                        </div>

                                       
                                            @if(Auth::user()->role == 'admin')

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="role" id="role" class="form-control">
                                                    <option value="">Select role</option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected':'' }}>Admin</option>
                                                    <option value="doctor" {{ $user->role == 'doctor' ? 'selected':'' }}>Doctor</option>
                                                    <option value="patient" {{ $user->role == 'patient' ? 'selected':'' }}>Patient</option>
                                                </select>
                                                <span style="color:red">{{ $errors->first('role') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Photo</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input class="form-control" name="photo" type="file">
                                                <label class="label-error">{{ $errors->first('photo') }}</label>
                                            </div>
                                            <div class="col-md-2">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                                if($user->photo){
                                                $img = 'uploads/users/'.$user->photo; 
                                                }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 70px; height: 70px; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="password" name="password">
                                                <label class="label-error">{{ $errors->first('password') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="submit-section">
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