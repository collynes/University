@extends('layouts.alt')
@section('title', 'NRBW Pay Bill')
@section('content')
<div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card-panel">
        <h3 class="card-title">Student Registration</h3>
        @if (session('status'))
            <div class="card-panel green lighten-4 green-text text-darken-4">{{session('status')}}
            </div>
        @endif

        @if (session('err'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
        @endif
        <div class="row">
            {!! Form::open(['url' => '/student']) !!}
                {!! Form::token() !!}
                <div class="input-field col s12">
                    {!! Form::text('fname') !!}
                    {!! Form::label('fname', 'First Name') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('fname') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::text('lname') !!}
                    {!! Form::label('lname', 'Last Name') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('lname') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::select('gender',['M'=>'Male','F'=>'Female']) !!}
                    {!! Form::label('gender', 'Gender') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('gender') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::date('dob') !!}
                    {!! Form::label('dob', 'Date Of Birth') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('dob') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::text('email') !!}
                    {!! Form::label('email', 'Email') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('email') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::text('phone') !!}
                    {!! Form::label('phone', 'Phone') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('phone') }}</span>
                </div>
                <div class="input-field col s12">
                {!! Form::submit('Submit',['class'=>'btn black  white-text']) !!}
                </div>

            {!! Form::close() !!}
        </div>
        </div>
        </div>
    </div>
@endsection