@extends('layout')
@section('title')
<h1>All Blogs</h1>
@endsection
@section('create')
<a class="btn btn-primary" href="{{ route('blogs.create') }}">Create Post</a>
@endsection
@section('content')
     <!-- Main Content -->
  <div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <form action="/search" class="form-group" method="post">
          @csrf
          <div class="input-group">
            <input type="form-control" class="search" name="search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($blogs as $blog)
          <div class="post-preview">
            <a href="{{route('blogs.show',$blog->id)}}">
              <h2 class="post-title">
                {{$blog->title}}
              </h2>
              <h3 class="post-subtitle">
                {{$blog->description}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{auth()->user()->name}}</a>
                {{ $blog->created_at->diffForHumans()}}</p>
          </div>
          <div class="row">
            <div class="col-1">
              <a href="{{ route('blogs.show', $blog->id) }}" class="btn-xs btn-primary">View</a>
            </div>
              <div class="col-1">
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn-primary">Edit</a>
              </div>
              <div class="col-1">
                <form action="{{route('blogs.destroy', $blog->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Delete</button>
                </form>
              </div>
          </div>
          <hr>
        @endforeach
        <!-- Pager -->
        <div class="clearfix">
          {{$blogs->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection