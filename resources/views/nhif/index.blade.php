@extends('layouts.alt')
@section('title', 'BFUB stmt')
@section('content')
<div class="row">
        <div class="col s12 m8 offset-m2">
        <div class="card-panel">
        <h3 class="card-title">NHIF</h3>
			<div class="row">
			{!! Form::open(['url' => '/nhif/get']) !!}
			{!! Form::token() !!}
			<div class="input-field col s12">
			{!! Form::text('EslipNo','0488361') !!}
			{!! Form::label('EslipNo', 'Enter Eslip number') !!}
			<span class="helper-text red-text" data-error="wrong" data-success="right"> {{ $errors->first('EslipNo') }}</span>
			</div>


			<div class="input-field col s12">
			{!! Form::submit('Submit',['class'=>'waves-effect waves-light btn teal']) !!}
			</div>

			{!! Form::close() !!}
	        </div>
        </div>
         @if (session()->has('data'))
         <div class="card-panel">
      <table class="striped">
        <tbody>
          <tr>
            <td>EmployerCode</td>
            <td>{!! @session('data')->EmployerCode !!}</td>
          </tr>
          <tr>
            <td>EmployerName</td>
            <td>{!! @session('data')->EmployerName !!}</td>
          </tr>
          <tr>
            <td>EslipAmt</td>
            <td>{!! @session('data')->EslipAmt !!}</td>
          </tr>
          <tr>
            <td>EslipMonth</td>
            <td>{!! @session('data')->EslipMonth !!}</td>
          </tr>
          <tr>
            <td>EslipNo</td>
            <td>{!! @session('data')->EslipNo !!}</td>
          </tr>
          <tr>
            <td>NoOfEmployees</td>
            <td>{!! @session('data')->NoOfEmployees !!}</td>
          </tr>
          <tr>
            <td>TransactionID</td>
            <td>{!! @session('data')->TransactionID !!}</td>
          </tr>
        </tbody>
      </table>
      </div>
        @endif
        @if (session('err'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
        @endif
        </div>
    </div>
@endsection