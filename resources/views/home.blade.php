@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>

                    </h1>

                    You are logged in!

                    <a href="/books" class="btn btn-warning btn-sm float-right">Let's Start!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
