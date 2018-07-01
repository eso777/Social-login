@extends('layouts.layout')

@section('content')

    @include('layouts.nav')

    <div class="container">

        <div class="card card-default">
            <div class="card-header">
                Add a new Topic
            </div>
            <div class="panel-body">
                {!! Form::open(['action'=>'InsertController@store','class'=>'form-horizontal','files'=>true]) !!}
                    @include('insert._form',['type'=>'add'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection