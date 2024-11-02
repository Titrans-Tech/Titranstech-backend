<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Http\Resources\MeetingCollection;
use App\Http\Resources\MeetingResource;

use Illuminate\Http\Request;
// use Mailjet\Resources;
// use Mailjet\Client;
use App\Mail\MeetingFormMail;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view_meetings = Meeting::latest()->get();
        return new MeetingCollection($view_meetings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $add_meeting = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'body' => 'required|string',
        // ]);

          $add_meeting = Meeting::create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
          ]);   
        //   dd($add_meeting);

        // Send the email
       //$add_meeting =  Mail::to('Info@titranstech.co.uk')->send(new MeetingFormMail($add_meeting));


    //      $emailContent = [
    //         'Messages' => [
    //             [
    //                 'From' => [
    //                     'Email' => $request->email,
    //                     'Name' => $request->name,
    //                     'Body' => $request->body,
    //                 ],
    //                 'To' => [
    //                     [
    //                         'Email' => "info@titranstech.co.uk",
    //                         'Name' => "Titranstech"
    //                     ]
    //                 ],
    //                 'Subject' => "New Meeting Form Submission",
    //                 'TextPart' => "You have received a new form submission.",
    //                 'HTMLPart' => "<h3>New Form Submission</h3><p><strong>Name:</strong> {$validatedData['name']}</p><p><strong>Email:</strong> {$validatedData['email']}</p><p><strong>Message:</strong> {$validatedData['body']}</p>"
    //             ]
    //         ]
    //     ];

    //     // Send the email using Mailjet
    //     $mj = new Client(config('services.mailjet.key'), config('services.mailjet.secret'), true, ['version' => 'v3.1']);
    //     $response = $mj->post(Resources::$Email, ['body' => $emailContent]);

    //    // Check for a successful response
    //     if ($response->success()) {
    //         return response()->json(['message' => 'Form submitted successfully and email sent.'], 200);
    //     } else {
    //         return response()->json(['message' => 'Failed to send email.'], 500);
    //     }

    if ($add_meeting) {
        return response()->json(['message' => 'Form submitted successfully and email sent.'], 200);

    }else{
        return response()->json(['message' => 'Form not submitted successfully and email sent.']);

    }

    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $viewsingle_meetings = Meeting::latest()->get();
        return new MeetingResource($viewsingle_meetings);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return response()->json([
            'message' => 'meeting deleted successfully',
        ], 200);
        //
    }
}
