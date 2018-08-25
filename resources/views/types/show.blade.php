@extends('layouts.master')
@section('title')
    {{ $type->title }}
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/types">Types</a></li>
        <li class="breadcrumb-item active">
            {{ $type->title }}
        </li>
    </ol>
    <div class="container">

            @include('flash::message')

        <div class="row">
            <div class="col-md-6 offset-md-3 bg-grey-lighter p-3">
                <h1>
                    {{ $type->title }} <br>
                    <div class="badge {{ $type->color }} col-md-6 text-capitalize mr-4" style="width:100px; font-size:14px;">
                        {{ $type->color }}
                    </div>
                </h1>

                <div class="d-flex justify-content-end">
                    <form method="get" action="/types/{{ $type->id}}/edit">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            EDIT
                        </button>
                    </form>
                    <form class="pull-right" action="{{ action('TypeController@destroy', $type->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <button class="btn btn-sm btn-danger" data-toggle="confirmation"
                                data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
                                data-btn-ok-icon-class="" data-btn-ok-icon-content=""
                                data-btn-cancel-label="" data-btn-cancel-class="btn-danger"
                                data-btn-cancel-icon-class="" data-btn-cancel-icon-content="close"
                                data-title="Are You Sure?" data-content="You will lose this book forever!">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                DELETE
                        </button>
                    </form>
                </div>
                <a href="/types" class="float-right mt-3">
                    See all Types
                </a>
            </div>
        </div>
     </div>
@endsection
@section('script')
    <script type="text/javascript">
    $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    // other options
    });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(1500).fadeOut(550);
    </script>
@endsection
