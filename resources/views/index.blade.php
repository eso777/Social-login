@extends('layouts.layout')

@section('content')

    <div class="login-box">
        <h2 class="typeJs">
            <span class="typed-effect"></span>
        </h2>
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
        <a href="{{url('facebook/redirect')}}" class="social-button" id="facebook-connect"> <span>Connect with Facebook</span></a>
        <a href="{{url('google/redirect')}}" class="social-button" id="google-connect"> <span>Connect with Google</span></a>
        <a  onclick=" alert(' Sorry Sir , Still Under Working '); return false " href="{{url('twitter/redirect')}}" class=" disabled social-button" id="twitter-connect"> <span>Connect with Twitter</span></a>
    </div>

@endsection