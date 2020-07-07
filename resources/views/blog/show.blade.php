@extends('layout')  
@section('title')
<h1>Blog Detail</h1>
@endsection
@section('content')
     <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h2 class="section-heading">{{$blog->title}}</h2>
          <p>{{ $blog->description }}</p>
        </div>
      </div>
    </div>
  </article>
@endsection