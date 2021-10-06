<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{   
    // Method for blog list
    public function index()
    {   
        $blogs = Blog::all();
        return view('blog.list', compact('blogs'));
    }

    // Method for blog create
    public function create()
    {
        return view('blog.create');
    }

    // // Method for blog insert
    // public function create(Request $request)
    // {
        
    // }
}
