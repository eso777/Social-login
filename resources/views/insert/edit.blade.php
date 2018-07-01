@extends('layouts.layout')

@section('content')

    @include('layouts.nav')

    <div class="container">

        <div class="card card-default">
            <div class="card-header">
                Edit Topic : {{ @$topic->title }}
            </div>
            <div class="panel-body">
                {!! Form::model($topic,['method' => 'PATCH', 'action' => ['InsertController@update',$topic->id], 'class' => 'form-horizontal','files'=>true]) !!}
                    @include('insert._form',['type'=>'edit'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection