@extends('admin.layouts.app')
@section('title', 'Update Individual')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Update Patient Information</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('patient.update', $patient->patient_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ $patient->name }}" />
                                                        <label class="label-error">{{ $errors->first('name') }}</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>Date of Birth</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="date" name="date_of_birth" value="{{ $patient->date_of_birth }}" />
                                                        <label class="label-error">{{ $errors->first('date_of_birth') }}</label>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-1 ">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="d-flex align-items-center">
                                                           <span style="margin-right: 15px;">
                                                           <input type="radio" id="male" name="gender" @if($patient->gender=='male') checked @endif value="male"> <label for="male">Male</label>
                                                           </span>
                                                            <span style="margin-right: 15px;">
                                                            <input type="radio" id="female" name="gender" @if($patient->gender=='female') checked @endif value="female"> <label for="female">Female</label>
                                                            </span>
                                                            <span>
                                                            <input type="radio" id="others" name="gender" @if($patient->gender=='others') checked @endif value="others"> <label for="others">Others</label>
                                                            </span>
                                                        </div>
                                                        <label class="label-error">{{ $errors->first('gender') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Mobile</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="mobile_number" placeholder="Enter ID" value="{{ $patient->mobile_number }}" />
                                                        <label class="label-error">{{ $errors->first('mobile_number') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-3 mt-2">
                                                        <label>National Id</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="national_id" value="{{ $patient->national_id }}" />
                                                        <label class="label-error">{{ $errors->first('national_id') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="email" placeholder="Enter ID" value="{{ $patient->email }}" />
                                                        <label class="label-error">{{ $errors->first('email') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <label>Photo</label>
                                                    </div>
                                                    <div class="col-md-1 px-0">
                                                         <img src="{{ asset('uploads/patients/'.$patient->photo)}}" alt="Picture not Found" class="img-fluid" style="width: 100%; object-fit: cover;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="file" name="photo" />
                                                        <label class="label-error">{{ $errors->first('photo') }}</label>
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