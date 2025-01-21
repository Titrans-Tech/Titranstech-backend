<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addcourse(){
        
        return view('dashboard.admin.addcourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createcourse(Request $request){
         $request->validate([
            'title' => ['required', 'string', 'unique:courses'],
            'amount' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'body' => ['required', 'string'],
            'images' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slug = SlugService::createSlug(Course::class, 'slug', $request->title);

        $path = 'noimage';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resourceimages', $filename);
        }
        $add_course = new Course();
        $add_course->title = $request->title;
        $add_course->amount = $request->amount;
        $add_course->duration = $request->duration;
        $add_course->body = $request->body;
        $add_course->slug = $slug;
        $add_course->images = $path;
        $add_course->save();
        

        return redirect()->back()->with('success', 'Course added successfully');
    }


    public function viewcourse(){
        $view_courses = Course::latest()->get();
        return view('dashboard.admin.viewcourse', compact('view_courses'));
    }
    /**
     * Display the specified resource.
     */
    public function show($slug){
        $view_course = Course::where('slug', $slug)->first();
        return view('dashboard.admin.viewsinglecourse', compact('view_course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function editcourse($slug){
        $edit_course = Course::where('slug', $slug)->first();
        return view('dashboard.admin.editcourse', compact('edit_course'));
    }
    
    public function updatecourse(UpdateCourseRequest $request, $id){
        $update_course = Course::find($id);
        $path = 'noimage';
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('resourceimages', $filename);
        }
        $update_course->title = $request->title;
        $update_course->amount = $request->amount;
        $update_course->duration = $request->duration;
        $update_course->body = $request->body;
        $update_course->images = $path;
        $update_course->update();
        return redirect()->back()->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
