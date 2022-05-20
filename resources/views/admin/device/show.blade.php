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
                            <h5>{{ $device->brand }}</h5>
                        </div>
                        <div class="col-lg-6 text_right">
                            <a href="{{url('device/'.$device->device_id.'/edit')}}" class="btn btn-success">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Device Information</h4>
                                <table class="table table-striped border">
                                    <tr>
                                        <th>
                                            Unique ID
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->unique_device_id ? $device->unique_device_id : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Brand
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->brand ? $device->brand : '--' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            Model
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->model ? $device->model : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Series
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->series ? $device->series : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Test Type
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->test_type ? $device->test_type : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Description
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->description ? $device->description : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="middle">
                                            Device Picture
                                        </th>
                                        <th class="text-center" valign="middle">
                                            :
                                        </th>

                                        <td style="text-align: left;" valign="middle">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                            if($device->device_pic){
                                            $img = 'uploads/device/'.$device->device_pic;
                                            }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Device Owner
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->device_owner ? $device->device_owner : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Owner Type
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->owner_type ? $device->owner_type : '--' }}
                                        </td>
                                    </tr>

                                </table>

                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px; margin-top: 30px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Emergency Contact Information</h4>

                                <table class="table table-striped border">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->name : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Phone
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->phone : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->email : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            GPS Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->gps_pin : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Address
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->address : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Address Description
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Emergencycontact ? $device->Emergencycontact->adres_description : '--' }}
                                        </td>
                                    </tr>

                                </table>




                            </div>
                            <div class="col-lg-6">

                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Ppbagent Information</h4>
                                <table class="table table-striped border">

                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Ppbagent ? $device->Ppbagent->name : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Ppbagent ? $device->Ppbagent->pin : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="middle">
                                            Pin Attachment
                                        </th>
                                        <th class="text-center" valign="middle">
                                            :
                                        </th>
                                        <td style="text-align: left;" valign="middle">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                            if($device->Ppbagent && $device->Ppbagent->pin_attachment){
                                            $img = 'uploads/ppbagent/'.$device->Ppbagent->pin_attachment;
                                            }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            C 12
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;" valign="middle">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                            if($device->Ppbagent && $device->Ppbagent->c_12){
                                            $img = 'uploads/ppbagent/'.$device->Ppbagent->c_12;
                                            }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Description
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Ppbagent ? $device->Ppbagent->description : '--' }}
                                        </td>
                                    </tr>
                                    
                                </table>



                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px; margin-top: 30px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Device Operation</h4>

                                <table class="table table-striped border">
                                    <tr>
                                        <th>
                                            Start Date One
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->s_date_one : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            End Date One
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->e_date_one : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Start Date Two
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->s_date_two : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            End Date One
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->e_date_two : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Start Date Two
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->s_date_three : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            End Date One
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->deviceoperations ? $device->deviceoperations->e_date_three : '--' }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                @if($device->Company)
                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px; margin-top: 30px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Company Information</h4>
                                <table class="table table-striped border">

                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->name : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->pin : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="middle">
                                            Pin Attachment
                                        </th>
                                        <th class="text-center" valign="middle">
                                            :
                                        </th>

                                        <td style="text-align: left;" valign="middle">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                            if($device->Company && $device->Company->pin_attachment){
                                            $img = 'uploads/company/'.$device->Company->pin_attachment;
                                            }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Phone
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->phone : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->email : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Post Office
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->p_o_box : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            City
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->city : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Country
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->country : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Sub Country
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->sub_country : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Gps Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Company ? $device->Company->gps_pin : '--' }}
                                        </td>
                                    </tr>
                                </table>
                                @endif

                                @if($device->Individual)

                                <h4 style="font-size: 20px; line-height: 32px; color: #111; padding-bottom: 10px; margin-top: 30px;border-bottom: 2px solid #ccc; margin-bottom: 10px;">Individual Information</h4>
                                <table class="table table-striped border">

                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->name : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Date of Birth
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->date_of_birth : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Gender
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;" valign="middle">
                                            {{ $device->Individual ? $device->Individual->gender : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            National ID
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">

                                            {{ $device->Individual ? $device->Individual->national_id : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            NID Picture
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>

                                        <td style="text-align: left;" valign="middle">
                                            @php
                                            $img = 'uploads/not-available.jpg' ;
                                            if($device->Individual && $device->Individual->national_id_attachment){
                                            $img = 'uploads/individual/'.$device->Individual->national_id_attachment;
                                            }
                                            @endphp
                                            <img src="{{ asset($img)}}" alt="Picture not Found" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->pin : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pin Attachment
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Phone
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->phone : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->email : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Post Office
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->p_o_box : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            City
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->city : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Country
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->country : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Sub Country
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->sub_country : '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            GPS Pin
                                        </th>
                                        <th class="text-center">
                                            :
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $device->Individual ? $device->Individual->gps_pin : '--' }}
                                        </td>
                                    </tr>
                                </table>

                                @endif
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