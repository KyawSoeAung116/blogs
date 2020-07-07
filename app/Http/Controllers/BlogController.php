<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;


use App\Blog;

class BlogController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository) {
        $this->blogRepository = $blogRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs = $this->blogRepository->index();

        return view('blog.index',compact('blogs'))
                     ->with('i', (request()->input('page', 1) - 1) * 5);        
    }

    public function create()
    {

        return view('blog.create');
    }

    
    public function store(BlogRequest $request)
    {
        $blog = Blog::create($request->validated());

        return redirect()->route('blogs.index');
    }


    public function show(Blog $blog)
    {

        return view('blog.show',compact('blog'));
    }

    
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return redirect()->route('blogs.index')
                         ->with('success','Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
                         ->with('success','Blog delete successfully');
    }

    public function search(Request $request)
    {
        $blogs =$this->blogRepository->search($request);

        return view('blog.index',compact('blogs'));

    }
}
 