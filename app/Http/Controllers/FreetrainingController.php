<?php

namespace App\Http\Controllers;

use App\Models\Freetraining;
use Illuminate\Http\Request;
use App\Notifications\FormSubmitted; // Create this notification
use App\Mail\UserNotificationMail;

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
         'course' => ['required', 'string'],
         'dob' => ['required', 'string'],
         'degree_obtain' => ['required', 'string'],
         'school_name' => ['required', 'string'],
         'year_graduate' => ['required', 'string'],
         'country' => ['required', 'string'],
         
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

 
     
     if ($user) {
        return response()->json(['message' => 'You have registered successfully.'], 201);

     }else{
         return response()->json(['message' => 'You have not submitted your form successfully']);
 
     }
}
}