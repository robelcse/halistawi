@extends('admin.layouts.app')
@section('title', 'Create Ppbagent')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Create Ppbagent</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('ppbagent.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="name" placeholder="Enter name" />
                                                <label class="label-error">{{ $errors->first('name') }}</label>
                                            </div>
                                            
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Cr-12</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="c_12" placeholder="Cr-12">
                                                <label class="label-error">{{ $errors->first('c_12') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Pin</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="pin" placeholder="pin">
                                                <label class="label-error">{{ $errors->first('pin') }}</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Pin Copy</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" name="notes" type="file">
                                                <label class="label-error">{{ $errors->first('notes') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Others Description</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                                <label class="label-error">{{ $errors->first('notes') }}</label>
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