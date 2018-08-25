@extends('layouts.master')
@section('title')
        Users

@endsection
@section('content')

    @include('front.partials.nav')
    @include('front.partials.login-notice')
    <div class="container mt-4">
        @foreach ($users as $user)
            <h1>
                <a href="/users/{{ $user->id }}">
                    {{ $user->name }}
                </a>
            </h1>
        @endforeach
    </div>


@endsection
