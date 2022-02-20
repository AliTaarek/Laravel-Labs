@extends('layouts.app')

@section('title') Show Post @endSection

@section('content')

<div class="card mt-5">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">
    <h5 class="card-title p-2"><b>Title :- </b>{{$post['title']}}</h5>
    <h5 class="p-2">Description :-</h5>
    <p class="card-text p-2">{{$post['description']}}.</p>
  </div>
</div>

<div class="card mt-5">
  <h5 class="card-header">Post Creator Info</h5>
  <div class="card-body">
    <h6 class="p-2"><b>Name :- </b>{{$creator['name']}}</h5>
    <h6 class="p-2"><b>Email :- </b>{{$creator['email']}}</h5>
    <h6 class="p-2"><b>Created At :- </b>{{$creator['created_at']}}</h5>
  </div>
</div>


@endSection