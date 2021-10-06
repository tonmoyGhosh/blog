<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Response;
use Validator;
use DB;

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

    // Method for blog insert
    public function insert(Request $request)
    {  
        DB::beginTransaction();

        try
        { 
            $rules = array(
                        'name' => 'required',
                    );

            $attributeNames = array(
                    'name' => 'Name'
                );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);

            if($validator->fails())
            {   
                $notification = array(
                    'responseTitle'  => 'error',
                    'responseText'   => 'Name field is required'
                );

                return response()->json($notification);
            }
            else
            {   
                $blog               = new Blog;
                $blog->name         = $request->name;
                $blog->slug         = $request->slug;
                $blog->category     = $request->category;
                $blog->tag          = $request->tag;
                $blog->banner       = $request->banner;
                $blog->body         = $request->body;
                $blog->save();

                DB::commit();

                $notification = array(
                    'responseTitle'  => 'success',
                    'responseText'   => 'Blog inserted successfully!'
                );

                return response()->json($notification);

            }

        }
        catch (\Exception $e)
        {
            DB::rollback();

            $notification = array(
                'responseTitle'  => 'error',
                'responseText'   => 'Something went wrong',
                'consoleMsg'     => $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage(),
            );

            return response()->json($notification);
        }

    }

    // Method for blog edit
    public function edit($id)
    {   
        return view('blog.edit', compact('id'));
    }

    // Method for get blog data
    public function getData($id)
    {   
        $blog = Blog::find($id);

        $notification = array(
            'responseTitle'  => 'success',
            'responseText'   => $blog
        );

        return response()->json($notification);
    }

    // Method for blog update
    public function update(Request $request)
    {  
        DB::beginTransaction();

        try
        { 
            $rules = array(
                    'name' => 'required',
                );

            $attributeNames = array(
                    'name' => 'Name'
                );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($attributeNames);

            if($validator->fails())
            {   
                $notification = array(
                    'responseTitle'  => 'error',
                    'responseText'   => 'Name field is required'
                );

                return response()->json($notification);
            }
            else
            {   
                $blog               = Blog::find($request->id);
                $blog->name         = $request->name;
                $blog->slug         = $request->slug;
                $blog->category     = $request->category;
                $blog->tag          = $request->tag;
                $blog->banner       = $request->banner;
                $blog->body         = $request->body;
                $blog->save();

                DB::commit();

                $notification = array(
                    'responseTitle'  => 'success',
                    'responseText'   => 'Blog updated successfully!'
                );

                return response()->json($notification);

            }

        }
        catch (\Exception $e)
        {
            DB::rollback();

            $notification = array(
                'responseTitle'  => 'error',
                'responseText'   => 'Something went wrong',
                'consoleMsg'     => $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage(),
            );

            return response()->json($notification);
        }

    }

    // Method for blog update
    public function delete(Request $request)
    {  
        DB::beginTransaction();

        try
        { 
            $blog = Blog::where('id', $request->id)->delete();
            
            DB::commit();

            $notification = array(
                'responseTitle'  => 'success',
                'responseText'   => 'Blog deleted successfully!'
            );

            return response()->json($notification);
        }
        catch (\Exception $e)
        {
            DB::rollback();

            $notification = array(
                'responseTitle'  => 'error',
                'responseText'   => 'Something went wrong',
                'consoleMsg'     => $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage(),
            );

            return response()->json($notification);
        }

    }
    
}
