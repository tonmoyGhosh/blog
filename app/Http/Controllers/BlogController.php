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
                        'slug' => 'required'
                    );

            $attributeNames = array(
                'name' => 'Name',
                'slug' => 'Slug'
            );

            $validator = Validator::make ( $request->all(), $rules);
            $validator->setAttributeNames($attributeNames);

            if($validator->fails())
            {
                return response::json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            else
            {   
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
}
