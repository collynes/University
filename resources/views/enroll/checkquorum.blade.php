@extends('layouts.alt')
@section('title', 'Enroll')
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
            <div class="collection">
               <a href="#!" class="collection-item"><span class="badge">1</span>Alan</a>
               <a href="#!" class="collection-item"><span class="new badge">4</span>Alan</a>
               <a href="#!" class="collection-item">Alan</a>
               <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection