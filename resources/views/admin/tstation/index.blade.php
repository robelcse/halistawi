@extends('admin.layouts.app')
@section('title', 'Test Station')
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
                        <a href="{{url('/tstation/create')}}" class="btn btn-success">Add New</a>
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
                                        <th>Type</th>
                                        <th>City</th>
                                        <th>Contact Name</th>
                                        <th>Mobile Number</th>
                                        <th style="text-align: center; min-width: 130px;">Action</th>
                                    </tr>

                                    @php $x = 0 @endphp
                                    @foreach($tstations as $tstation)
                                    @php $x++ @endphp
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>{{$tstation->name}}</td>
                                        <td>{{$tstation->type}}</td>
                                        <td style="text-align: center;">{{ $tstation->words ? ucwords(strtolower($tstation->words)) : '--' }}</td>
                                        <td>{{$tstation->contact_name}}</td>
                                        <td>{{$tstation->mobile_number}}</td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('tstation.show', $tstation->teststation_id) }}">
                                            <i data-feather="eye" style="width: 17px;"></i>
                                            </a>
                                            <a href="{{url('tstation/'.$tstation->teststation_id.'/edit')}}" style="margin-right: 8px!important; margin-left: 8px!important;" >
                                                <i data-feather="edit" style="width: 17px; color: #000;"></i>
                                            </a>
                                            <a href="" onclick="deleteTstation({{ $tstation->teststation_id }})">
                                            <i data-feather="trash-2" style="width: 17px; color: red;"></i>
                                            </a>
                                            <form action="{{ url('tstation/'.$tstation->teststation_id) }}" id="delete-data-{{ $tstation->teststation_id }}" method="post" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="justify-content-center d-flex mt-2">
                        {{ $tstations->links('pagination::bootstrap-4') }}
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
    function deleteTstation(tstationId) {

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
                document.getElementById('delete-data-' + tstationId).submit();
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