@extends('admin.layouts.app')
@section('title', 'Test Station Edit')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                   <div class="row">
                       <div class="col-lg-6">
                       <h5>Test Station : {{ $tstation->name ? $tstation->name : '--' }}</h5>
                       </div>
                       <div class="col-lg-6 text_right">
                           <a href="{{url('/tstation/'.$tstation->tstation_id.'/edit')}}" class="btn btn-warning">Edit</a>
                       </div>
                   </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <table class="table table-striped">
                                <tr>
                                       <th>
                                           Name
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->name ? $tstation->name : '--' }}
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>
                                           Type
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->type ? $tstation->type : '--' }}
                                       </td>
                                   </tr>
                                   @if($tstation->category)
                                   <tr>
                                       <th>
                                           Category
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->category ? $tstation->category : '--' }}
                                       </td>
                                   </tr>
                                   @endif
                                   <tr>
                                       <th>
                                           Unique ID
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->unique_id ? $tstation->unique_id : '--' }}
                                       </td>
                                   </tr>
                                   
                                   <tr>
                                       <th>
                                           Contact Name
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->contact_name ? $tstation->contact_name : '--' }}
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>
                                           Mobile Number
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->mobile_number ? $tstation->mobile_number : '--' }}
                                       </td>
                                   </tr>
                                   <tr>
                                    <th>
                                        Email
                                    </th>
                                    <th class="text-center">
                                        :
                                    </th>
                                    <td>
                                        {{ $tstation->email ? $tstation->email : '--' }}
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                               <table class="table table-striped">
                                   
                                   <tr>
                                       <th>
                                           Post Office
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->po_box ? $tstation->po_box : '--' }}
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>
                                           Words
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->words ? $tstation->words : '--' }}
                                       </td>
                                   </tr>
                                   <tr>
                                    <th>
                                       Sub Country
                                    </th>
                                    <th class="text-center">
                                        :
                                    </th>
                                    <td>
                                        {{ $tstation->sub_country ? $tstation->sub_country : '--' }}
                                    </td>
                                </tr>
                                   <tr>
                                       <th>
                                           Country
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->country ? $tstation->country : '--' }}
                                       </td>
                                   </tr>
                                   
                                   <tr>
                                       <th>
                                          GPS Pin
                                       </th>
                                       <th class="text-center">
                                           :
                                       </th>
                                       <td>
                                           {{ $tstation->gps_pin ? $tstation->gps_pin : '--' }}
                                       </td>
                                   </tr>
                                   
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