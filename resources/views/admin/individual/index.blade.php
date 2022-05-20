@extends('admin.layouts.app')
@section('title', 'Ppbagent')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                <div class="row">
                        <div class="col-lg-12">
                        <form action="">
                            <div class="search_fld d-flex align-items-center justify-content-end">
                                    <input type="text" placeholder="Type here..." style="padding-left: 10px; height: 34px; margin-right: 12px;" name="q">
                                    <button type="submit" class="btn btn-info">Search</button>
                            </div>
                            </form>
                        </div>
                    </div>
                  
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>National Id</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th style="text-align: center;">View</th>
                                    </tr>
                                    @foreach($individuals as $individual)
                                    <tr>
                                        <td>{{$individual->name}}</td>
                                        <td>{{$individual->date_of_birth}}</td>
                                        <td>{{$individual->gender}}</td>
                                        <td>{{$individual->national_id}}</td>
                                        <td>{{$individual->phone}}</td>
                                        <td>{{$individual->email}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ url('/device/'.$individual->device_id) }}" class="btn btn-success">Device </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="justify-content-center d-flex mt-2">
                        {{ $individuals->links('pagination::bootstrap-4') }}
                    </div>
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