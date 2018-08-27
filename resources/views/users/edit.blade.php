@extends('layouts.master')
@section('styles')
    <style media="screen">
    .section-title{
        font-size: 15px;
        text-align: center;
        font-family: 'Arial',serif;
        background:rgb(179, 179, 179);
        margin-top: 30px;
        color: white;
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
    }
    .edit-right,
    .edit-left {
        border-radius: 6px;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
    }
    .user-img {
        border-radius: 6px;
        position: relative;
    }
    .edit-title{
        font-family: 'Lobster', cursive;
        font-size: 35px;
    }
    .help-block {
        font-size: 12px;
        font-family: Arial;
        float:right;
    }
    .edit-left{
        max-height: 600px;
    }

    </style>
@endsection
@section('title')
    Edit Profile
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
        <li class="breadcrumb-item active">{{ $user->name }}</li>
        <li class="breadcrumb-item active">Edit Profile</li>
    </ol>

    <div class="container">
        <form class="" action="{{ action('usersController@update', $user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
        <div class="row">
            <div class="col-md-3 offse-md-1 edit-left bg-grey-lighter p-4 d-flex justify-content-center flex-column">

                    <img src="/{{ @Auth::user()->photo }}" class="user-img" id="user-img">

                <div class="form-group" style="margin-top:30px;">

                    <div class="mt-5">
                        <div class="section-title">Change Photo</div>
                        <hr>
                    </div>

                  <input type="file" class="form-control" id="image" name="image">
                  <p class="help-block text-right text-muted">Best Fit: 260x346(px)</p>
                </div>
            </div>

            <div class="col-md-9 edit-right bg-grey-lighter p-4">
                    <div class="mb-3 edit-title text-center">
                        Edit your Profile
                    </div>

                        <div class="mt-5">
                            <span class="section-title">Personal Info</span>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="name">First Name: </label>
                                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="last_name">Last Name: </label>
                                  <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Email: </label>
                                  <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                  <p class="help-block">
                                      <a href="#">Change Password</a>
                                  </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="education">Education: </label>
                                  <input type="text" class="form-control" name="education" value="{{ $user->education }}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <span class="section-title">Social Media</span>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control" value="{{ $user->facebook}}" placeholder="Facebook" name="facebook">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control" value="{{ $user->instagram }}" placeholder="Instagram" name="instagram">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control" value="{{ $user->website }}" placeholder="Website" name="website">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <span class="section-title">Location</span>
                            <hr>
                        </div>
                        <div class="map">
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.623312112092!2d100.62295581394652!3d13.7412410903543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61d74e32d94f%3A0xe8b621a15db071d5!2sThe+Nine+Center+Rama+9!5e0!3m2!1sen!2sth!4v1534930775058" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                            @include('front.partials.map-picker')
                        </div>
                        <div class="mt-5">
                            <hr>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                </form>
                </div>
            </div>
        </form>
        <form class="float-right" action="index.html" method="post">
            <a href="#" class="btn btn-danger btn-sm">Remove Account</a>
        </form>
    </div>
</div>

@endsection
@section('script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script type="text/javascript">
    // $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#user-img').attr('src', e.target.result);
                $('#user-icon').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
        readURL(this);
        });
    // });
    </script>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>

@endsection
