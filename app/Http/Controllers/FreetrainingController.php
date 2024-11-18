<?php

namespace App\Http\Controllers;

use App\Models\Freetraining;
use Illuminate\Http\Request;
use App\Notifications\FormSubmitted; // Create this notification
use App\Mail\UserNotificationMail;
use App\Mail\TestMail;

use Illuminate\Support\Facades\Mail;
use Notification;



class FreetrainingController extends Controller
{
    //
    public function createsfreestraining(Request $request){
        $request->validate([
         'fname' => ['required', 'string'],
         'lname' => ['required', 'string'],
         'phone' => ['required', 'string'],
         'email' => ['required', 'string'],
         'gender' => ['required', 'string'],
         'course' => ['nullable', 'string'],
         'dob' => ['nullable', 'string'],
         'degree_obtain' => ['nullable', 'string'],
         'school_name' => ['nullable', 'string'],
         'year_graduate' => ['nullable', 'string'],
         'country' => ['nullable', 'string'],
         
        ]);
         $user = Freetraining::create([
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
    
     Mail::to($user->email)->send(new UserNotificationMail(
        [
        'fname' => $user->fname,
        'lname' => $user->lname
    ]));

    // Send the email
    //Mail::to($user->email)->send(new TestMail($user));

 
     
     if ($user) {
        return response()->json(['message' => 'You have registered successfully.'], 201);

     }else{
         return response()->json(['message' => 'You have not submitted your form successfully']);
 
     }
}



}