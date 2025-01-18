<?php

namespace App\Http\Controllers;

use App\Models\Freetraining;
use Illuminate\Http\Request;
use App\Notifications\FormSubmitted; // Create this notification
use App\Mail\UserNotificationMail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Mail;
use Notification;



class FreetrainingController extends Controller
{
    public function createsfreestraining(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'string', 'unique:freetrainings'],
            'phone' => ['required', 'string', 'unique:freetrainings'],
            'fname' => ['required', 'string'],

            'lname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'course' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
            'degree_obtain' => ['nullable', 'string'],
            'school_name' => ['nullable', 'string'],
            'year_graduate' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
        ]);

        Freetraining::create([
            'fname' => $validated['fname'],
            'email' => $validated['email'],
            'lname' => $validated['lname'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'school_name' => $validated['school_name'],
            'year_graduate' => $validated['year_graduate'],
            'country' => $validated['country'],
            'degree_obtain' => $validated['degree_obtain'],
            'course' => $validated['course'],
        ]); 
       
    
       
        // Mailtrap API payload
        $payload = [
            'from' => [
                'email' => config('mail.from.address', env('MAILTRAP_FROM_EMAIL')),
                'name' => config('mail.from.name', env('MAILTRAP_FROM_NAME')),
            ],
            'to' => [
                ['email' => $validated['email']],
            ],
            'template_uuid' => 'e9792245-31c0-49d1-be8a-2b6c6a27ce91',
            'template_variables' => [
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
            ],
        ];

       
        // Send email via Mailtrap API
        $response = Http::withToken('572c9443e4748848a61e8e1f9bab53e3')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://send.api.mailtrap.io/api/send', $payload);

        if ($response) {

            
        return response()->json(['message' => 'Thank you for registering for our upcoming SKILL UP NIGERIA TRAINING PROGRAMME'], 200);

     }else{
         return response()->json(['message' => 'You have not submitted your form successfully']);
 
     }

   }

    

    

   public function viewfreetraining(){
    $view_frees = Freetraining::latest()->get();
    return view('dashboard.admin.viewfreetraining', compact('view_frees'));
 }
    //  Mail::to($user->email)->send(new UserNotificationMail(
    //     [
    //     'fname' => $user->fname,
    //     'lname' => $user->lname
    // ]));

    // Send the email
    
    // Mail::to($user->email)->send(new UserNotificationMail($user));

    // if ($user) {
    //     return response()->json(['message' => 'You have registered successfully.'], 201);

    //  }else{
    //      return response()->json(['message' => 'You have not submitted your form successfully']);
 
    //  }
     
     



}