@extends('layouts.app2')

@section('content')
<div class="mt-5  p-2">

  @if (Auth::check())

    <h1 class="text-white bg-dark py-2 text-center">Welcome {{auth()->user()->name}}</h1>

      <div class="container bg-white con ">

            <div class="d-flex">
              <h3 class="mx-2 text-dark text-uppercase">Multi-Tenancy Blog</h3>
              <a href="{{route('show.form')}}" class="blog btn btn-success">Create Post</a>
            </div>
      </div>

      <div class="container text-white">
        <table class="text-center table table-dark table-striped">
          <tr class="">
            <th>Title</th>
            <th>Content</th>
            <th class="text-danger">Action</th>
          </tr>
          @foreach ( $posts as $post )
            <tr>
              <td>{{$post->title}}</td>
              <td>{!!Str::limit($post->content, 50)!!}</td>
              <td>
                @if (Auth::id() === $post->user_id)
                <div class="d-flex justify-content-center align-items-center">
                  <a href="" class="btn btn-primary">View</a>
                  <a href="{{route('edit', $post->id)}}" class="mx-2 btn btn-warning">Edit</a>
                  <form action="{{route('destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </div>
                
                @else
                <a href="" class="btn btn-primary">View</a>
                @endif
               
              </td>
            </tr>
          @endforeach
         
        </table>
      </div>

    @else
    <h1>Welcome, You're a Guest</h1>
  @endif
  
</div>
@endsection