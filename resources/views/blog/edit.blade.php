@extends('layout')
@section('title')
<h1>Edit Blogs</h1>
@endsection
@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg col-md-10 mx-auto">
       <form action="{{route('blogs.update',$blog->id)}}" method="post">
           @csrf
           @method('PUT')
           <div class="form-group">
               <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $blog->title }}">
               @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           </div>
           <div class="form-group">
               <input type="text" class="form-control" name="description" placeholder="Description" value="{{  $blog->description }}">
           </div>
           <button type="submit" class="btn btn-primary">Send</button>
       </form>
      </div>
  </div>
</div>
@endsection