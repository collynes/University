@extends('layouts.alt')
@section('title', 'Card stmt')
@section('content')
<div class="row">
<div class="card-panel white lighten-4 green-text text-darken-4"> <B>REGISTERD STUDENTS</B></div>
@include('sweet::alert');
        <!-- <div class="card-panel scroll"> -->
        <table class="striped">
        <thead>
          <tr>
              <th>Reg Number</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Date OF Birth</th>
              <th>Email</th>
              <th>Phone</th>
          </tr>
        </thead>

        <tbody>
           @foreach ($students as $key => $value)
          <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->fname !!}</td>
            <td>{!! $value->lname !!}</td>
            <td>{!! $value->gender !!}</td>
            <td>{!! $value->dob !!}</td>
            <td>{!! $value->email !!}</td>
            <td>{!! $value->phone !!}</td>
          </tr>
            @endforeach
        </tbody>
      </table>
        </div>
      
        </div>
    </div>
@endsection