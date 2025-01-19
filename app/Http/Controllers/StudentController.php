<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //starlydc_priscorad  KQ?hzUFr63gp

    public function createstudent(Request $request){
       $request->validate([
        'fname' => ['required', 'string'],
        'lname' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'email' => ['required', 'string'],
        'gender' => ['required', 'string'],
        'course' => ['required', 'string'],
        'dob' => ['required', 'string'],
        'degree_obtain' => ['required', 'string'],
        'school_name' => ['required', 'string'],
        'year_graduate' => ['required', 'string'],
        'country' => ['required', 'string'],
        
       ]);
        $add_student = Student::create([
        'fname' => $request->fname,
        'email' => $request->email,
        'lname' => $request->lname,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'dob' => $request->dob,
        'school_name' => $request->school_name,
        'year_graduate' => $request->year_graduate,
        'country' => $request->country,
        'degree_obtain' => $request->degree_obtain,
        'course' => $request->course,
    ]);   
    
    if ($add_student) {
        return response()->json(['message' => 'You have submitted your form successfully'], 200);

    }else{
        return response()->json(['message' => 'You have not submitted your form successfully']);

    }
}

public function viewstudents(){
    $view_students = Student::latest()->get();
    return view('dashboard.admin.viewstudents', compact('view_students'));
}

public function viewsinglestudent($id){
    $view_student = Student::find($id);
    return view('dashboard.admin.viewsinglestudent', compact('view_student'));

}

public function deletestudent($id){
    $delete_student = Student::find($id);
    $delete_student->delete();
    return redirect()->back()->with('success', 'Student deleted successfully');

}

}