@extends('layouts.master')
@section('title')
    Types
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5" style="margin-bottom:-2px;">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Types</li>
    </ol>
    <!--Jumbotron-->
        <div class="jumbotron">
            <h1 class="h1-reponsive mb-3 blue-text"><strong class="text-white">
                <i class="fa fa-bookmark"></i>
                Types</strong></h1>

            <hr class="my-4">
            <!-- search form -->
            <form class="form-inline d-flex justify-content-center">
              <label class="sr-only" for="inlineFormInputName2">Name</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

              <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
              </div>

              <div class="form-check mb-2 mr-sm-2">
                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                <label class="form-check-label" for="inlineFormCheck">
                  Remember me
                </label>
              </div>

              <button type="submit" class="btn btn-warning btn-sm mb-2">Search</button>
            </form>
        </div>
    <!--Jumbotron-->
    <div class="container mt-4">
        @include('flash::message')
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="types/create" class="text-orange float-right font-bold">
                    New Type
                </a>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Titles</th>
                      <th scope="col">Badges</th>
                      <th >

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($types as $type)
                        <tr>
                          <th scope="row">{{ $type->id }}</th>
                          <td>
                            {{ $type->title }}
                          </td>
                          <td>
                              <span class="badge {{ $type->color }} col-md-6">

                                  {{ $type->title }}
                            </span>
                          </td>
                          <td>
                               <a href="/types/{{ $type->id }}" class="font-bold text-danger">
                                   Open
                               </a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
