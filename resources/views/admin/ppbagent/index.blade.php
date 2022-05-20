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
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Pin</th>
                                        <th>CR-12</th>
                                        <th>Notes</th>
                                        <th style="text-align: center;">View</th>
                                    </tr>

                                    @php $x = 0 @endphp
                                    @foreach($ppbagents as $ppbagent)
                                    @php $x++ @endphp
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>{{$ppbagent->name}}</td>
                                        <td>{{$ppbagent->pin}}</td>
                                        <td>{{$ppbagent->c_12}}</td>
                                        <td>
                                            <img src="{{ asset('uploads/ppbagent/'.$ppbagent->note)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 50px; object-fit: cover;">
                                        </td>
                                      
                                        <td style="text-align: center;">
                                            <a href="{{ url('/device/'.$ppbagent->device_id) }}" class="btn btn-success">Device </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="justify-content-center d-flex mt-2">
                        {{ $ppbagents->links('pagination::bootstrap-4') }}
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
    function deletePpbagent(ppbagentId) {

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
                document.getElementById('delete-data-'+ppbagentId).submit();
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