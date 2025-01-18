<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mailjet\Resources;
use Mailjet\Client;
use Illuminate\Support\Facades\Http;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewcontacts()
    {
        $view_contacts = Contact::latest()->get();
        return view('dashboard.admin.viewcontacts', compact('view_contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|string',
            'subject' => 'required|string',
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'body' => $validated['body'],
            'subject' => $validated['subject'],
            
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
            'template_uuid' => '5689ab9f-8a84-4b46-bf70-7ea8e9f2ecfc',
            'template_variables' => [
                'name' => $validated['name'],
                'subject' => $validated['subject'],
            ],
        ];

       
        // Send email via Mailtrap API
        $response = Http::withToken('572c9443e4748848a61e8e1f9bab53e3')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://send.api.mailtrap.io/api/send', $payload);

        if ($response) {

            
        return response()->json(['message' => 'Thank you for contacting us'], 200);

     }else{
         return response()->json(['message' => 'You have not submitted your form successfully']);
 
     }

   }
    // public function store(Request $request){
    //     $add_contact = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'body' => 'required|string',
    //         'subject' => 'required|string',
    //     ]);
    //     $add_contact = Contact::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'body' => $request->body,
    //         'subject' => $request->subject,
    //     ]);

    //    $add_contact =  Mail::to('Info@titranstech.co.uk')->send(new ContactMail($add_contact));

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


    // if ($add_contact) {
    //     return response()->json(['message' => 'Form submitted successfully and email sent.'], 200);

    // }else{
    //     return response()->json(['message' => 'Form not submitted successfully and email sent.']);

    // }
    

    // }

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
    public function destroy($id){
        $delete_contact = Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully');

    }
}
