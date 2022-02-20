@extends('layouts.app')

@section('title') Update Post @endSection

@section('content')
<form class="mt-5" method="POST" action="{{route('posts.update', ['post' => $post['id']])}}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="text" value="{{$post['title']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{$post['body']}}</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
        <option value="1">Ahmed</option>
        <option value="2">Ali</option>
        <option value="3">Mohammed</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-success">Update</button>
</form>

@endSection