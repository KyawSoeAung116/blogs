<?php
use Illuminate\Http\Request;
namespace App\Repositories;
use App\Blog;

class BlogRepository  
{
    public function index()
    {
       return Blog::latest()->paginate(5);
    }

    public function create()
    {
    }
    public function search($request)
    {
      if($request->has('search')){
        return $blogs = Blog::search($request->search)
             ->paginate(5);
     }else{
        return $blogs = Blog::paginate(5);
     }
    }
}
