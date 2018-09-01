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
    <link href="https://fonts.googleapis.com/css?family=Courgette|Lobster|Noto+Serif|Oswald|Poller+One|Unna|Roboto:300,400|Monoton" rel="stylesheet">


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
    <!-- progress bar -->
    <link rel="stylesheet" href="{{ asset('css/circle.css') }}">
    <!-- slider css -->
    <link rel="stylesheet" href="{{ asset('css/lightslider.css') }}">

    <!-- tinyMCE -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mafple32967qfow7fwcr9hbjz1gyj9jmi02aq0ke5pflv3xf"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
			changeYear: true,
            yearRange: "-100:+0"
        });
      });
     </script>
     <script>
      tinymce.init({
        selector: '#mytextarea',
        forced_root_block : ""
      });
    </script>
    <script type="text/javascript">
    	$(document).ready(function() {
    		$("li").click(function(){
    			$(this).toggleClass("active");
    			$(this).next("div").stop('true','true').slideToggle("slow");
    		});
    	});
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#content-slider').lightSlider({
            item:6,
            loop:true,
            auto:true,
            slideMove:6,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed:600,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:3,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:2,
                        slideMove:1
                      }
                }
            ]
        });
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
