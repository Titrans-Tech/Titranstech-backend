<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Http\Requests\StoreJobpostRequest;
use App\Http\Requests\UpdateJobpostRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Resources\JobpostResourceCollection;
use App\Http\Resources\JobpostResource;
use App\Models\Job;

class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addjob (){
        return view('dashboard.admin.addjob');
    }

    public function viewjobs()
    {
        $view_jobs = Jobpost::latest()->get();
        return view('dashboard.admin.viewjobs', compact('view_jobs'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'company' => 'required|string',
            'company_url' => 'required|string',
            'images' => 'nullable|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $slug = SlugService::createSlug(Jobpost::class, 'slug', $request->title);

        $path = 'noimage';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resourceimages', $filename);
        }
        $add_blog = new Jobpost();
        $add_blog->title = $request->title;
        $add_blog->body = $request->body;
        $add_blog->company = $request->company;
        $add_blog->company_url = $request->company_url;
        
        $add_blog->slug = $slug;
        $add_blog->images = $path;
        $add_blog->save();

        return redirect()->back()->with('message', 'Job added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function editjob($slug)
    {
        $edit_jobs = Jobpost::where('slug', $slug)->first();
        return view('dashboard.admin.editjob', compact('edit_jobs'));
    }

    public function show($slug)
    {
        $viewsingle_jobs = Jobpost::where('slug', $slug)->first();
        return view('dashboard.admin.viewsinglejobs', compact('viewsingle_jobs'));
    }
    
    /**
     * Update the specified resource in storage.Jobpost $jobpost
     */
    public function update(Request $request, $slug)
    {
        $edit_jobs = Jobpost::where('slug', $slug)->first();
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'company' => ['required', 'string'],
            'company_url' => ['required', 'string'],
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_jobs['images'] = $path;
        }else{
           $path = 'noimage'; 
        }

        $edit_jobs->title = $request->title;
        $edit_jobs->company_url = $request->company_url;
        $edit_jobs->company = $request->company;
        $edit_jobs->body = $request->body;
        $edit_jobs->update();

        return redirect()->back()->with('message', 'Job updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jobpost = Jobpost::findOrFail($id);
        $jobpost->delete();

        return redirect()->back()->with('success', 'Job deleted successfully');

    }

    public function viewjobsapi()
    {
        $view_jobs = Jobpost::latest()->get();

        return new JobpostResourceCollection($view_jobs);
    }

    public function viewsinglejobdetailapi($slug)
    {
        $viewsingle_jobs = Jobpost::where('slug', $slug)->first();

        return new JobpostResource($viewsingle_jobs);
    }
}
