@extends('layouts.layout')

@section('content')

    @include('layouts.nav')

    <div class="container">
        <h3>
           MANAGE PAGE
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($topics->total())
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">OPTIONS</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{$topic->id}}</td>
                            <td>{{$topic->title}}</td>
                            <td>
                                <a href="{{$topic->image}}"  title="OPEN IN A NEW TAB">
                                    <img src="{{$topic->image}}" class="img-thumbnail img-responsive" alt="Current image" width="70" height="70">
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action' =>['InsertController@destroy',$topic->id]]) !!}
                                <a href="{{ Url('/') }}/insert/{{ $topic->id }}/edit"
                                   class="btn btn-warning btn-circle">Edit</a>
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-circle'] ) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                No Records to show !
            </div>
        @endif
        <a class="btn btn-primary" href="{{Url('/insert/create')}}"> Create a new Topic  </a>

        <p>
            {{ $topics->render()  }}

        </p>
    </div>


@endsection