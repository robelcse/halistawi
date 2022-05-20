@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid dashboard-default-sec">
  <div class="row mb-3">
    <div class="col-md-4">
      <h6 class="mt-2">County</h6>
      <select name="country" class="form-control" id="country">
        <option selected disabled value="0">Select County</option>
        @foreach($all_county as $county)
        <option value="{{ $county->name }}" data-code="{{ $county->county_code }}">{{ $county->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <h6 class="mt-2">Sub-County</h6>
      <select name="sub_country" class="form-control" id="sub_country">
        <option selected disabled value="0">Select Sub County</option>
      </select>
    </div>
    <div class="col-md-4">
      <h6 class="mt-2">Words</h6>
      <select name="words" class="form-control" id="words">
        <option selected disabled value="0">Select Words</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body text-center">
          <h4><span id="n_t_station">{{ $n_t_station }}</span></h4>
          <h5 style="font-weight: 600;">Test Station </h5>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body text-center">
          <h4><span id="n_device">{{ $n_device }}</span></h4>
          <h5 style="font-weight: 600;">Device</h5>

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 des-xl-50 yearly-growth-sec">
      <div class="card">
        <div class="card-header">
          <div class="header-top d-sm-flex justify-content-between align-items-center">
            <h5>Monthly Tests</h5>
            <h5>{{ var_dump(Auth::user()->role) }}</h5>
          </div>
        </div>
        <div class="card-body p-0 chart-block" style="max-width: 100%; overflow-x: hidden;">
          <div id="chart-yearly-growth-dash-2"></div>

        </div>
      </div>
    </div>

    <div class="col-xl-12 box-col-12 des-xl-100 invoice-sec">
      <div class="card">
        <div class="card-header">
          <div class="header-top d-sm-flex justify-content-between align-items-center">
            <h5>Tests by gender</h5>
            <div class="center-content">
              <p class="d-sm-flex align-items-center"><span class="m-r-10">$5,56548k</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>94% More Than Last Year</p>
            </div>
            <div class="setting-list">
              <ul class="list-unstyled setting-option">
                <li>
                  <div class="setting-primary"><i class="icon-settings"></i></div>
                </li>
                <li><i class="view-html fa fa-code font-primary"></i></li>
                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                <li><i class="icofont icofont-error close-card font-primary"> </i></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div id="timeline-chart"></div>

        </div>
      </div>
    </div>
    <div class="col-xl-6 box-col-12 des-xl-100">
      <div class="row">

        <!-- <div class="col-xl-12 box-col-6 des-xl-50">
          <div class="card mb-2">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>User Activations</h5>
                <div class="center-content">
                  <p>Yearly User 24.65k</p>
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="view-html fa fa-code font-primary"></i></li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary"></i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div id="user-activation-dash-2"></div>

            </div>
          </div>
        </div> -->



      </div>


    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body item_user">

          <div class="row">
            @foreach($users as $user)
            <div class="col-lg-3">
              <div class="owl-carousel-16 owl-carousel owl-theme">
                <div class="item">
                  <div class="card mb-0">
                    <div class="top-dealerbox text-center">
                      @php
                      $img = 'uploads/not-available.jpg' ;
                      if($user->photo){
                      $img = 'uploads/users/'.$user->photo;
                      }
                      @endphp
                      <img src="{{ asset($img)}}" alt="User Avatar" class="img-fluid card-img-top" style="border-radius: 50%;">
                      <a href="{{ url('/admin') }}">
                        <h6>{{$user->name}}</h6>
                      </a>
                      <p class="mb-0">{{$user->email}}</p>
                      @if(Auth::user()->role == 'admin')
                      <a class="btn btn-rounded" href="{{ url('admin/'.$user->id.'/edit') }}">Edit</a>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <!-- <div class="google_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28966.763386939987!2d89.26558734999999!3d24.834959299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1639886237675!5m2!1sen!2sbd" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div> -->
      <div id="map" style="height: 800px; width: auto;">
      </div>
    </div>
  </div>
</div>
<?php

$data_array = [];
$colors = ["#000", "#ddd", "#425683", "#2aba6a", "#dcd50c", "#0cdcc9", "#dc0ccc", "#1f181e", "#bc2f0f", "#07baff", "#7207ff", "#07fff4"];
for ($i = 1; $i <= $all_patients->count(); $i++) {
  $index = str_pad($i, 2, 0, STR_PAD_LEFT);
  if (isset($all_patients[$index])) {
    $single_date = [
      "x" =>  $i,
      "y" => $all_patients[$index]->count(),
      "fillColor" => $colors[$i],
    ];
    $data_array[] = $single_date;
  }
}

?>

<?php

$male_arr   = $total_male_female[0];
$female_arr = $total_male_female[1];

?>
<script>
  var options51 = {
    series: [{
      name: "Yearly Profit",
      data: <?= json_encode($data_array); ?>
    }],
    chart: {
      height: 350,
      type: "bar",
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "70%",
      }
    },
    stroke: {
      show: false,
    },
    dataLabels: {
      enabled: false
    },
    fill: {
      opacity: 1
    },
    xaxis: {
      type: "datetime",
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        formatter: function(val) {
          return val / 100 + "K";
        },
      }
    },
    responsive: [{
      breakpoint: 991,
      options: {
        chart: {
          height: 250
        }
      }
    }],
    colors: ["#d8e3e5"]
  };
</script>

@endsection

@section('script')

<script>
  //overview section chart in dashboard-2
  var options25 = {
    chart: {
      type: "line",
      height: 450,
      foreColor: "#999",
      stacked: true,
      dropShadow: {
        enabled: true,
        enabledSeries: [0],
        top: -2,
        left: 2,
        blur: 5,
        opacity: 0.06
      },
      toolbar: {
        show: false,
      },
    },
    responsive: [{
        breakpoint: 1470,
        options: {
          chart: {
            height: 440
          }
        }
      },
      {
        breakpoint: 1365,
        options: {
          chart: {
            height: 300
          }
        }
      },
      {
        breakpoint: 991,
        options: {
          chart: {
            height: 250
          }
        }
      },
    ],
    colors: [vihoAdminConfig.primary, vihoAdminConfig.secondary],
    stroke: {
      width: 3
    },
    dataLabels: {
      enabled: false
    },
    series: [{
      name: 'Male',
      data: <?= json_encode($male_arr); ?>
    }, {
      name: 'Female',
      data: <?= json_encode($female_arr); ?>
    }],

    markers: {
      size: 5,
      strokeColor: "#e3e3e3",
      strokeWidth: 3,
      strokeOpacity: 1,
      fillOpacity: 1,
      hover: {
        size: 6
      }
    },
    xaxis: {
      type: "datetime",
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      labels: {
        offsetX: 14,
        offsetY: -5
      },
      tooltip: {
        enabled: true
      },
      labels: {
        formatter: function(value) {
          return value + "k";
        },
      },
    },
    grid: {
      padding: {
        left: -5,
        right: 5
      }
    },
    tooltip: {
      x: {
        format: "dd MMM yyyy"
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      show: false
    },
    fill: {
      type: "solid",
      fillOpacity: 0.7
    },
  };

  var chart25 = new ApexCharts(document.querySelector("#timeline-chart"),
    options25
  );
  chart25.render();

  function generateDayWiseTimeSeries(s, count) {
    var values = [
      [
        4, 3, 10, 9, 29, 19
      ],
      [
        2, 3, 8, 7, 22, 16
      ]
    ];
    var i = 0;
    var series = [];
    var x = new Date("11 Nov 2012").getTime();
    while (i < values[0].length) {
      series.push([x, values[s][i]]);
      x += 86400000;
      i++;
    }

    return series;
  }
</script>

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
      let countryName = country.value
      let countryId = country.options[country.selectedIndex].dataset.code;

      fetch(`${baseUrl}/tstation-count/sub-counties/${countryId}/${countryName}`)
        .then((response) => response.json())
        .then(function(subcounty) {

          $('#n_t_station').innerHTML = subcounty.c_t_station
          $('#n_device').innerHTML = subcounty.total_device
          subcounty.all_sub_country.forEach((data) => {
            let option = document.createElement('option')
            option.innerHTML = data.name
            option.setAttribute('value', data.name)
            option.setAttribute('data-id', data.sub_county_code)
            option.setAttribute('data-name', data.name)
            sub_county.append(option)
          })
        });
    })


    sub_county.addEventListener('change', function(event) {


      subCountryCode = sub_county.options[sub_county.selectedIndex].dataset.id;
      subCountryName = sub_county.options[sub_county.selectedIndex].dataset.name;

      words.innerHTML = '<option selected disabled value="0">Select Sub County</option>'

      fetch(`${baseUrl}/tstation-count/words/${subCountryCode}/${subCountryName}`)

        .then((response) => response.json())
        .then(function(subcounty) {

          $('#n_t_station').innerHTML = subcounty.c_t_station
          $('#n_device').innerHTML = subcounty.total_device

          subcounty.all_sub_county_code.forEach((data) => {
            let option = document.createElement('option')
            option.innerHTML = data.name
            option.setAttribute('value', data.name)
            words.append(option)
          })
        });
    })

    words.addEventListener('change', function(event) {
      let wv = words.value

      fetch(`${baseUrl}/tstation-count/words-count/${wv}`)

        .then((response) => response.json())
        .then(function(subcounty) {

          $('#n_t_station').innerHTML = subcounty.c_t_station
          $('#n_device').innerHTML = subcounty.total_device

        });
    })

  });
</script>

<!-- <script>
  
    let allGpsPin = JSON.parse('<?php //echo $all_gps_pin; 
                                ?>')
    console.log(allGpsPin) 

</script> -->

<!--========api call for show pin in google maps=============-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDANq-s9vPrjpwiCiwCKsU4EZEbSA3N-4k"></script>
<script type="text/javascript">
  //dom content loaded event listener
  window.addEventListener('DOMContentLoaded', (event) => {
    getLocation(InitMap);

  });

  //locations array
  var locations = [];

  /*
   *
   * get locations from api and init into locations array
   * @param Callback [initMap]
   *
   *  @return locations array
   *
   */

  var getLocation = async function(callback) {

    //get base url
    var baseUrl = window.location.origin + "/hasli-stawi";

    var results = await fetch(`${baseUrl}/api/allgpspin`)
      .then((response) => response.json())
      .then((json) => json);

    for (var i = 0; i < results.data.length; i++) {

      var latLang = results.data[i].gps_pin.split(',');
      let location = {
        country: results.data[i].location,
        lat: parseFloat(latLang[0]),
        lng: parseFloat(latLang[1])
      }

      locations.push(location)
    }
    callback()
  }

  /**
   *
   * init map and show pin in the map
   *
   */

  function InitMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng(23.684994, 90.356331),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
        map: map
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i].country);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  }
</script>

@endsection