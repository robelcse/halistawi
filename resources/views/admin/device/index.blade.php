@extends('admin.layouts.app')
@section('title', 'Device')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                   <div class="row">
                       <div class="col-lg-6">
                       <form action="">
                            <div class="search_fld d-flex align-items-center">
                                    <input type="text" placeholder="Type here..." style="padding-left: 10px; height: 34px; margin-right: 12px;" name="q">
                                    <button type="submit" class="btn btn-info">Search</button>
                            </div>
                            </form>
                       </div>
                       <div class="col-lg-6 text_right">
                            <a href="{{url('/device/create')}}" class="btn btn-success">Add New</a>
                       </div>
                   </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table" >
                                    <tr>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Device ID</th>
                                        <th>Series</th>
                                        <th>Test Type</th>
                                        <th>Picture</th>
                                        <th style="text-align: center; width: 100px;">Action</th>
                                    </tr>

                                    @foreach($devices as $device)
                                    <tr>
                                        <td>{{$device->brand}}</td>
                                        <td>{{$device->model}}</td>
                                        <td>{{$device->unique_device_id}}</td>
                                        <td>{{$device->series}}</td>
                                        <td>{{ $device->test_type}}</td>
                                       
                                        <td>
                                        @php
                                        $img = 'uploads/not-available.jpg' ;
                                            if($device->device_pic){
                                            $img = 'uploads/device/'.$device->device_pic; 
                                            }
                                        @endphp
                                        <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 50px; object-fit: cover;">
                                        </td>
                                        
                                        <td style="text-align: center">
                                        <a href="{{url('device/'.$device->device_id)}}">
                                                <i data-feather="eye" style="width: 17px;"></i>
                                            </a>
                                            <a href="{{url('device/'.$device->device_id.'/edit')}}" style="margin-right: 8px!important; margin-left: 8px!important;" >
                                            <i data-feather="edit" style="width: 17px; color: #000;"></i>
                                            </a>
                                            <a href="" onclick="deleteIndividualInfo( {{$device->device_id}} )">
                                            <i data-feather="trash-2" style="width: 17px; color: red;"></i>
                                            </a>
                                            <form action="{{url('device/'.$device->device_id.'/delete')}}" method="post" id="delete-data-{{ $device->device_id }}" style="display: none;">
                                            @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center d-flex mt-2">
                        {{ $devices->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function deleteIndividualInfo(companyId) {

        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-data-'+companyId).submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Individul info has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your date is safe :)',
                    'error'
                )
            }
        })

    }
</script>
@endsection