<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mailjet\Resources;
use Mailjet\Client;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add_contact = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|string',
            'subject' => 'required|string',
        ]);
        $add_contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'subject' => $request->subject,
        ]);

       $add_contact =  Mail::to('Info@titranstech.co.uk')->send(new ContactMail($add_contact));

        // Send the email
        // Mail::to('simonudo74@gmail.com')->send(new MeetingFormMail($validatedData));


    //      $emailContent = [
    //         'Messages' => [
    //             [
    //                 'From' => [
    //                     'Email' => $request->email,
    //                     'Name' => $request->name,
    //                     'Message' => $request->body,
    //                     'Subject' => $request->subject,
    //                 ],
    //                 'To' => [
    //                     [
    //                         'Email' => "info@titranstech.co.uk",
    //                         'Name' => "Titranstech"
    //                     ]
    //                 ],
    //                 'Subject' => "New Meeting Form Submission",
    //                 'TextPart' => "You have received a new form submission.",
    //                 'HTMLPart' => "<h3>New Form Submission</h3><p><strong>Name:</strong> {$validatedData['name']}</p><p><strong>Email:</strong> {$validatedData['email']}</p><p><strong>Message:</strong> {$validatedData['body']}</p> <p><strong>Subject:</strong> {$validatedData['subject']}</p>"
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


    if ($add_contact) {
        return response()->json(['message' => 'Form submitted successfully and email sent.'], 200);

    }else{
        return response()->json(['message' => 'Form not submitted successfully and email sent.']);

    }
    

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
