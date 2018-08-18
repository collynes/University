@extends('layouts.alt')
@section('title', 'NRBW Pay Bill')
@section('content')
<div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card-panel">
        <h3 class="card-title">-----</h3>
        @if (session('status'))
            <div class="card-panel green lighten-4 green-text text-darken-4">{{session('status')}}
            </div>
        @endif

        @if (session('err'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
        @endif
        <div class="row">
            {!! Form::open(['url' => '/enroll']) !!}
                {!! Form::token() !!}
                <div class="input-field col s12">
                
                <!-- {!! Form::select('course',$courses) !!} -->
                {!! Form::select('id', $courses, null, ['class' => 'form-control']) !!}
                {!! Form::label('course', 'Course') !!}
                <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('biller_code') }}</span>
                </div>
                <div class="input-field col s12">
                 {!! Form::select('period',['0'=>'JAN-MAY','1'=>'MAY-AUG','2'=>'AUG-DEC']) !!}
                 {!! Form::label('Period', 'Semester Dates') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('account_number') }}</span>
                </div>
                <div class="input-field col s12">
                {!! Form::select('id', $students, null, ['class' => 'form-control']) !!}
                  {!! Form::label('Student', 'Student') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('transaction_amount') }}</span>
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