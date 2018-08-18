@extends('layouts.alt')
@section('title', 'Enroll')
@section('content')
<div class="row">
   <div class="col s12 m8 offset-m2">
      <div class="card-panel">
         <h3 class="card-title">Quorum</h3>
         @if (session('status'))
         <div class="card-panel green lighten-4 green-text text-darken-4">{{session('status')}}
         </div>
         @endif
         @if (session('err'))
         <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('err') }}</div>
         @endif
         <div class="row">
         <table class="striped">
        <thead>
          <tr>
              <th>Course</th>
              <th>Enrolled</th>
              <th>Operations</th>
         
          </tr>
        </thead>

        <tbody>
        @foreach($enrolls as $enrolled)
          <tr>
            <td>{!! $enrolled->course !!}</td>
            <td>{!! $enrolled->students->count() !!}</td>
            <td class="collection-item"> 
            <button class="btn waves-effect waves-light" type="submit" name="action">Start Course <i class="material-icons right"></i>
            </button>
        </td>
          </tr>
        @endforeach
          </tbody>
      </table>
      
        </div>
         </div>
      </div>
   </div>
</div>
@endsection