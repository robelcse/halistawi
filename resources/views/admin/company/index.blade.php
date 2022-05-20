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
                                        <th>Pin</th>
                                        <th>CR-12</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Picture</th>
                                        <th style="text-align: center;">View</th>
                                    </tr>

                                    @if( count($companies) != 0 )

                                    @foreach ($companies as $company)
                                    <tr>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->pin}}</td>
                                        <td>{{$company->c_12}}</td>
                                        <td>{{$company->phone}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->city}}</td>
                                        <td>
                                        @php
                                        $img = 'uploads/not-available.jpg' ;
                                            if($company->pin_attachment){
                                            $img = 'uploads/company/'.$company->pin_attachment; 
                                            }
                                        @endphp
                                        <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ url('/device/'.$company->device_id) }}" class="btn btn-success">Device </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else

                                    <tr>
                                        <td colspan="7" class="text-center">Data not available!</td>
                                    </tr>

                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="justify-content-center d-flex mt-2">
                        {{ $companies->links('pagination::bootstrap-4') }}
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
    function deleteCompany(companyId) {

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
                    'Company has been deleted.',
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