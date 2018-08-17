@extends('layouts.alt')
@section('title', 'Startimes Query Bill')
@section('content')
<div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card-panel">
        <h3 class="card-title">Startimes Query Bill</h3>
        @if (session()->has('data'))
            <div class="card-panel green lighten-4 green-text text-darken-4">Process completed successfully!
            </div>
            <ul class="collection with-header">
                <li class="collection-header"><h4>Account Details</h4></li>
                <li class="collection-item"><b>Biller code: </b>{!! @session('data')->BillerCode !!}</li>
                <li class="collection-item"><b>Account Number: </b>{!! @session('data')->AccountNumber !!}</li>
                <li class="collection-item"><b>Account Name: </b>{!! @session('data')->AccountName !!}</li>
                <li class="collection-item"><b>Account Balance: </b>{!! @session('data')->AccountBalance !!}</li>
                <li class="collection-item"><b>Balance Due: </b>{!! @session('data')->GenericFields->GenericField->FieldValue !!}</li>
                <li class="collection-item"><b>Balance Due Date: </b>{!! @session('data')->BalanceDueDate !!}</li>
                <li class="collection-item"><b>Bill Collection Account: </b>{!! @session('data')->BillCollectionAccount !!}</li>
            </ul>
         
        @endif

        @if (session('err'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
        @endif
        <div class="row">
            {!! Form::open(['url' => '/nrb/queryBill']) !!}
                {!! Form::token() !!}
                <div class="input-field col s12">
                    {!! Form::text('biller_code') !!}
                    {!! Form::label('biller_code', 'Biller Code') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('biller_code') }}</span>
                </div>
                <div class="input-field col s12">
                    {!! Form::text('account_number') !!}
                    {!! Form::label('account_number', 'Account Number') !!}
                    <span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('account_number') }}</span>
                </div>

                
                <div class="input-field col s12">
                    {!! Form::submit('Submit',['class'=>'waves-effect waves-light btn teal darken-4']) !!}
                </div>

            {!! Form::close() !!}
        </div>
        </div>
        </div>
    </div>
@endsection