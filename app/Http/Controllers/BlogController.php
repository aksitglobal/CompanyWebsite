<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published', true)->latest()->paginate(9);
        return view('pages.blog', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        if (!$blog->is_published) {
            abort(404);
        }
        return view('pages.blog-single', compact('blog'));
    }
}
