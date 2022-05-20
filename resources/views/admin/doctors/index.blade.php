@extends('admin.layouts.app')
@section('title', 'List of Patients')
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
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>gender</th>
                                        <th>NID</th>
                                        <th>Email</th>
                                        <th>Phone</th>  
                                        <th>Picture</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>

                                    @if( count($doctors) != 0 )
                                    @php $x=0 @endphp
                                    @foreach ($doctors as $doctor)
                                    @php $x++ @endphp
                                    <tr>
                                        <td valign="middle">{{ $x }}</td>
                                        <td valign="middle">{{$doctor->name}}</td>
                                        <td valign="middle">{{$doctor->date_of_birth}}</td>
                                        <td valign="middle">{{$doctor->gender}}</td>
                                        <td valign="middle">{{$doctor->national_id}}</td>
                                        <td valign="middle">{{$doctor->email}}</td>
                                        <td valign="middle">{{$doctor->mobile_number}}</td>  
                                        <td valign="middle">
                                            <img src="{{ asset('uploads/users/'.$doctor->photo)}}" alt="Picture not Found" class="img-fluid" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                        </td>
                                        <td style="text-align: center" valign="middle">
                                            <a href="{{url('doctor/'.$doctor->id.'/edit')}}" style="margin-right: 7px;">
                                            <i data-feather="edit" style="width: 17px; color: #000;"></i>
                                            </a>
                                            <a href="" onclick="deletedoctor({{ $doctor->id }})">
                                            <i data-feather="trash-2" style="width: 17px; color: red;"></i>
                                            </a>
                                            <form action="{{ url('doctor/'.$doctor->id.'/delete') }}" id="delete-data-{{ $doctor->id }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else

                                    <tr >
                                        <td class="text-center" colspan="5">Data not available!</td>
                                    </tr>

                                    @endif
                                </table>
                            </div>
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
    function deletedoctor(doctorId) {

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
                document.getElementById('delete-data-'+doctorId).submit();
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