@extends('layouts.master')
@section('title')
    Welcome
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    @include('front.partials.slider')
    @include('front.partials.testimonials')
    <div class="container mt-4">




        </div>


    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 1000,
                pause: false
            });
        });
    </script>
@endsection
