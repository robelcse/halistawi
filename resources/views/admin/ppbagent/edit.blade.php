@extends('admin.layouts.app')
@section('title', 'Update Ppbagent')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Update Ppbagent</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('ppbagent.update', $ppbagent->ppbagent_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="name" value="{{ $ppbagent->name }}" />
                                                <label class="label-error">{{ $errors->first('name') }}</label>
                                            </div>
                                            
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Pin</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="pin" value="{{ $ppbagent->pin }}" />
                                                <label class="label-error">{{ $errors->first('pin') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Cr-12</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="c_12" value="{{ $ppbagent->c_12 }}" />
                                                <label class="label-error">{{ $errors->first('c_12') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Notes</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" name="notes" type="file">
                                                <label class="label-error">{{ $errors->first('notes') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="submit-section text_right">
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