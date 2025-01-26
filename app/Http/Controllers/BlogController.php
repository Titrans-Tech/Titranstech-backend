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

     public function addblog(){

        return view('dashboard.admin.addblog');
     }
    public function viewblog(){
        
        $view_blogs = Blog::latest()->get();
        // return new BlogCollection($view_blogs);
        return view('dashboard.admin.viewblog', compact('view_blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:255',
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);

        $path = 'noimage';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resourceimages', $filename);
        }
        $add_blog = new Blog();
        $add_blog->title = $request->title;
        $add_blog->body = $request->body;
        $add_blog->author = $request->author;
        $add_blog->slug = $slug;
        $add_blog->images = $path;
        $add_blog->save();

        return redirect()->back()->with('message', 'Blog added successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $viewsingle_blog = Blog::where('slug', $slug)->first();

        return view('dashboard.admin.viewsingleblog', compact('viewsingle_blog'));
    }


    public function ediblog($slug){
        $edit_blog = Blog::where('slug', $slug)->first();
        return view('dashboard.admin.editblog', compact('edit_blog'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug){
        $edit_blog = Blog::where('slug', $slug)->first();

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'author' => 'nullable|string',
            'images' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // $edit_blog = Blog::findOrFail($id);
        // dd($request);
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

        return redirect()->back()->with('message', 'You updated the blog succesffuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('message', 'You updated the blog succesffuly');

    }


    public function viewblogapi(){
        // destiny-can-be-delayed-but-con-not-change
        $view_blogs = Blog::latest()->get();
        return new BlogCollection($view_blogs);
    }

    public function viewsingleblogdetailapi(Request $request){
        $slug = $request->slug;
        $viewsingle_blog = Blog::where('slug', $slug)->first();
        return new BlogResource($viewsingle_blog);
    }

}
