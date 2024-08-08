<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Http\Requests\StoreJobpostRequest;
use App\Http\Requests\UpdateJobpostRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Resources\JobpostResourceCollection;
use App\Http\Resources\JobpostResource;
class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_jobs = Jobpost::latest()->get();
        return new JobpostResourceCollection($view_jobs);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobpostRequest $request)
    {
        $add_blog = Jobpost::create([
            'title' => $request->title,
            'body' => $request->body,
            'company' => $request->company,
            'slug' => SlugService::createSlug(Jobpost::class, 'slug', $request->title),
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
            // 'path' => $path,
            'message' => 'You have created job successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $viewsingle_jobs = Jobpost::where('slug', $slug)->first();
        return new JobpostResource($viewsingle_jobs);
    }

    /**
     * Update the specified resource in storage.Jobpost $jobpost
     */
    public function update(UpdateJobpostRequest $request, $slug)
    {
        $edit_job = Jobpost::where('slug', $slug)->first();
        
        $edit_job = Jobpost::validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'company' => ['required', 'string'],
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_job['images'] = $path;
        }else{
           $path = 'noimage'; 
        }

       

        // $path = $request->file('images')->store('images', 'public');
        return response()->json([
            'blog' => $edit_job,
            'message' => 'You have created job successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jobpost = Jobpost::findOrFail($id);
        $jobpost->delete();

        return response()->json([
            'message' => 'blog deleted successfully',
        ], 200);
    }
}
