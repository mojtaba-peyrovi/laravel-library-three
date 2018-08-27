<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library | @yield('title')</title>
    @yield('stylesheets')
    <!-- google font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Lobster|Noto+Serif|Oswald|Poller+One|Unna|Roboto:300,400" rel="stylesheet">


    <!-- favicon -->
    <link rel="icon" href="/img/favicon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- custom css -->
    @yield('styles')

    <!-- tailwind cdn -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" >


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      });
     </script>



    </head>
  <body>

      @yield('content')


      <!-- JQuery -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>
      <script src="/js/bootstrap-confirmation.js"></script>
      <script src="/js/popper.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" charset="utf-8"></script>

      {{-- <script src="/js/bootstrap-imageupload.js" charset="utf-8"></script>
      <script type="text/javascript">
         $('.img-upload').imgupload();
      </script> --}}
      @yield('script')
      <!-- google map -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJBrwwsSaOkWXXELEWoV4SNB_WUkMWIuw&libraries=places&callback=initMap" async defer></script>
      @include('front.partials.footer')

  </body>
</html>
