@extends('layouts.layout')

@section('content')

    @include('layouts.nav')

    <div class="container">
       <h5>
           Welcome {{ Auth('web')->user()->name }}
       </h5>

        <p>
            This is home page for your dashboard ...
        </p>
    </div>

@endsection