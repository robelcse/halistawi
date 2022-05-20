@extends('admin.layouts.app')
@section('title', 'Create Ppbagent')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Create Teststation</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="webshop-title">
                                    <form action="{{ route('tstation.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter test-statio name" />
                                                <label class="label-error">{{ $errors->first('name') }}</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Type</label>
                                                    @php
                                                    $types = array_map('trim', old('type') ? old('type') : []);
                                                    @endphp
                                                </div>

                                                <div class="col-md-7 ">
                                                    <div class="d-flex justify-content-between align-items-center flex_dir">
                                                        <span>
                                                            <input type="checkbox" name="type[]" {{ in_array('Kiosk', $types) ?  "checked" : "" }} value="Kiosk" id="Kiosk"><label for="Kiosk">Kiosk</label>
                                                        </span>
                                                        <span><input type="checkbox" name="type[]" {{ in_array('Mobile Tester', $types) ?  "checked" : "" }} value="Mobile Tester" id="m_tester"><label for="m_tester">Mobile Tester</label></span>
                                                        <span>
                                                            <input type="checkbox" name="type[]" {{ in_array('Public Organization', $types) ?  "checked" : "" }} value="Public Organization" id="p_org"><label for="p_org">Public Organization</label>
                                                        </span>
                                                        <span>
                                                            <input type="checkbox" name="type[]" {{ in_array('Private Organization', $types) ?  "checked" : "" }} value="Private Organization" id="pr_org"><label for="pr_org">Private Organization</label>
                                                        </span>
                                                    </div>
                                                    <label class="label-error">{{ $errors->first('type') }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Contact Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="{{ old('contact_name') }}" name="contact_name" placeholder="Enter contact name" />
                                                <label class="label-error">{{ $errors->first('contact_name') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Mobile Number</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Enter mobile number" />
                                                <label class="label-error">{{ $errors->first('mobile_number') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>E-Mail</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="{{ old('email') }}" name="email" placeholder="Enter E-mail" />
                                                <label class="label-error">{{ $errors->first('email') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>P.O.Box</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="{{ old('po_box') }}" name="po_box" placeholder="Enter p-o-box" />
                                                <label class="label-error">{{ $errors->first('po_box') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>County</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="country" class="form-control" id="country">
                                                    <option selected disabled value="0">Select County</option>
                                                    @foreach($all_county as $county)
                                                    <option value="{{ $county->name }}" @if(old('country')==$county->name) selected @endif data-id="{{ $county->county_code }}">{{ $county->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="label-error">{{ $errors->first('country') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Sub-County</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="sub_country" class="form-control" id="sub_country">
                                                    <option selected disabled value="0">Select Sub County</option>
                                                </select>
                                                <label class="label-error">{{ $errors->first('sub_country') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Words</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="words" class="form-control" id="words">
                                                    <option selected disabled value="0">Select Words</option>
                                                </select>
                                                <label class="label-error">{{ $errors->first('words') }}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label>Location:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div id="map" style="display: none;"></div>
                                                <input class="form-control" type="text" id="pac-input" value="{{ old('location') }}" name="location" placeholder="Enter location" />
                                                <input type="hidden" id="lattlang" name="lattlang" value="{{ old('lattlang') }}"/>
                                                <label class="label-error">{{ $errors->first('location') }}</label>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="submit-section text_right">
                                                    <button class="btn btn-primary" type="submit">Save</button>
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

@section('script')
<script>
    var baseUrl = window.location.origin + "/hasli-stawi";
    //var baseUrl = window.location.origin;
    window.addEventListener('DOMContentLoaded', (event) => {
        function $(selector) {
            return document.querySelector(selector)
        }
        let country = $('#country')
        let sub_county = $('#sub_country')
        let words = $('#words')


        country.addEventListener('change', function(event) {

            sub_county.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            let countryId = country.options[country.selectedIndex].dataset.id;
            fetch(`${baseUrl}/tstation/sub-counties/${countryId}`)
                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        option.setAttribute('data-id', data.sub_county_code)
                        sub_county.append(option)
                    })
                });
        })


        sub_county.addEventListener('change', function(event) {

            subCountryCode = sub_county.options[sub_county.selectedIndex].dataset.id;

            words.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

            fetch(`${baseUrl}/tstation/words/${subCountryCode}`)

                .then((response) => response.json())
                .then(function(subcounty) {
                    subcounty.forEach((data) => {
                        let option = document.createElement('option')
                        option.innerHTML = data.name
                        option.setAttribute('value', data.name)
                        words.append(option)
                    })
                });
        })
    });
</script>

<!--==========script for API call=========-->
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k&callback=initMap&libraries=places&v=weekly&channel=2" async></script>

<script>
    // This sample uses the Place Autocomplete widget to allow the user to search
    // for and select a place. The sample then displays an info window containing
    // the place ID and other information about the place that the user has
    // selected.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&libraries=places">
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -33.8688,
                lng: 151.2195
            },
            zoom: 13,
        });
        const input = document.getElementById("pac-input");
        // Specify just the place data fields that you need.
        const autocomplete = new google.maps.places.Autocomplete(input, {
            fields: ["place_id", "geometry", "formatted_address", "name"],
        });

        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // const infowindow = new google.maps.InfoWindow();
        // const infowindowContent = document.getElementById("infowindow-content");

        // infowindow.setContent(infowindowContent);

        const marker = new google.maps.Marker({
            map: map
        });

        // marker.addListener("click", () => {
        //     infowindow.open(map, marker);
        // });
        autocomplete.addListener("place_changed", () => {
            // infowindow.close();

            const place = autocomplete.getPlace();

            let placeId = place.place_id

            if (typeof place.formatted_address === 'undefined') {
                console.log('can not find location')
                document.getElementById('lattlang').value = ''
            } else {


                //after getting place id call api for get lattitute and langitute
                fetch(`https://maps.googleapis.com/maps/api/geocode/json?place_id=${placeId}&key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k`)
                    .then((response) => response.json())
                    .then((json) => {
                            let lattLang = json.results[0].geometry.location
                            let address = place.formatted_address
                            document.getElementById('lattlang').value = lattLang.lat+' ,'+lattLang.lng

                            // console.log(address)
                            // console.log(lattLang)
                        }

                    );

            }

            if (!place.geometry || !place.geometry.location) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            // Set the position of the marker using the place ID and location.
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location,
            });
            marker.setVisible(true);
            // infowindowContent.children.namedItem("place-name").textContent = place.name;
            // infowindowContent.children.namedItem("place-id").textContent =
            //     place.place_id;
            // infowindowContent.children.namedItem("place-address").textContent =
            //     place.formatted_address;
            // infowindow.open(map, marker);
        });
    }
</script>
@endsection