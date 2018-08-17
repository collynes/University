@extends('layouts.alt')
@section('title', 'NRBW Pay Bill')
@section('content')
<div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card-panel">
        <h3 class="card-title">Add New Course</h3>
        @if (session('status'))
            <div class="card-panel green lighten-4 green-text text-darken-4">{{session('status')}}
            </div>
        @endif

        @if (session('err'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
        @endif
        <div class="row">
            {!! Form::open(['url' => 'course/new']) !!}
                {!! Form::token() !!}
                <div class="input-field col s12">
                    {!! Form::text('course') !!}
                    {!! Form::label('course', 'Course Name') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('course') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::text('description') !!}
                    {!! Form::label('description', 'Course Description') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('description') }}</span>
                </div>
               
                <div class="input-field col s12">
                    {!! Form::submit('Create',['class'=>'waves-effect waves-light btn teal white-text']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        </div>
        </div>
    </div>
@endsection