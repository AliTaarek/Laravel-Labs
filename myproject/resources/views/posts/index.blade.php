@extends('layouts.app')

@section('title') Index @endSection

@section('content')

    <div class="text-center my-4 ">
         <a href="{{route('posts.create')}}" class="btn btn-success ">Create Post</a>
    </div>
   
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : "Not Found"}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a> 
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <form id="myform" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger show_confirm " title='Delete' data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="Delete">
                                
                        </form>
                    </td>
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>
    {{$posts->links()}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
@endSection
