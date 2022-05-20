@extends('admin.layouts.app')
@section('title', 'Ppbagent')
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
                            <a href="{{url('/admin/create')}}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>DoB</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Picture</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>

                                    @php $x = 0 @endphp
                                    @foreach($users as $user)
                                    @php $x++ @endphp
                                    <tr>
                                        <td valign="middle">{{ $x }}</td>
                                        <td valign="middle">{{ $user->name }}</td>
                                        <td valign="middle">{{ $user->date_of_birth ? $user->date_of_birth : '--' }}</td>
                                        <td valign="middle">{{ $user->gender ? $user->gender : '--' }}</td>
                                        <td valign="middle">{{ $user->email}}</td>
                                        <td valign="middle">{{ $user->mobile_number ? $user->mobile_number : '--'}}</td>
                                        <td valign="middle">
                                        @php
                                        $img = 'uploads/not-available.jpg' ;
                                            if($user->photo){
                                            $img = 'uploads/users/'.$user->photo; 
                                            }
                                        @endphp
                                        <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                        </td>

                                        <td style="text-align: center" valign="middle">
                                            <a href="{{ url('admin/'.$user->id.'/edit') }}">
                                            <i data-feather="edit" style="width: 17px; color: #000;"></i>
                                            </a>
                                            <a href="" onclick="deleteUser({{ $user->id }})" style="margin-left: 7px;">
                                            <i data-feather="trash-2" style="width: 17px; color: red;"></i>
                                            </a>
                                            <form action="{{ route('admin.destroy',$user->id) }}" id="delete-data-{{ $user->id }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="justify-content-center d-flex mt-2">
                            {{ $users->links('pagination::bootstrap-4') }}
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
    function deleteUser(userId) {

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
                document.getElementById('delete-data-' + userId).submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Ppb agent has been deleted.',
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