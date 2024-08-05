<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $view_blogs = Blog::latest()->get();
        return new BlogCollection($view_blogs);
        // return response()->json([
        //     'blog' => $view_blogs,
        // ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //
        $add_blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'author' => $request->author,
            'slug' => SlugService::createSlug(Blog::class, 'slug', $request->title),
            
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
        }else{
           $path = 'noimage'; 
        }

        $add_blog['images'] = $path;

        // $path = $request->file('images')->store('images', 'public');
        return response()->json([
            // 'blog' => $add_blog,
            'path' => $path,
            'message' => 'You have created blog successfully'
        ], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $viewsingle_blog = Blog::where('slug', $slug)->first();
        return new BlogResource($viewsingle_blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $edit_blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'author' => 'nullable|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

            $edit_blog->images = $path;
        }else{
           $path = 'noimage'; 
        }

        $edit_blog->title = $request->title;
        $edit_blog->author = $request->author;
        $edit_blog->body = $request->body;
        $edit_blog->update();

        return response()->json([
            'message' => 'Blog updated successfully',
            'blog' => $edit_blog
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json([
            'message' => 'blog deleted successfully',
        ], 200);
    }
}
