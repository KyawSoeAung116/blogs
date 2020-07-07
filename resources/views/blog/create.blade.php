@extends('layout')
@section('title')
<h1>Create Posts</h1>
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg col-md-10 mx-auto">
            <form action="{{ route('blogs.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
           </div>
       </div>
   </div>
@endsection