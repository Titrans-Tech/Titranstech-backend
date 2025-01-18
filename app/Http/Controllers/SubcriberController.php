<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Subcriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreSubcriberRequest;
use App\Http\Requests\UpdateSubcriberRequest;
use App\Mail\WelcomeMail;

class SubcriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewsubscribers(){
        $view_subscribers = Subcriber::latest()->get();
       return view('dashboard.admin.viewsubscribers', compact('view_subscribers')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'string', 'unique:subcribers'],
            
        ]);

        Subcriber::create([
            'email' => $validated['email'],
            'fname' => 'simon',
           
        ]); 
       
       
        $payload = [
            'from' => [
                'email' => config('mail.from.address', env('MAILTRAP_FROM_EMAIL')),
                'name' => config('mail.from.name', env('MAILTRAP_FROM_NAME')),
            ],
            'to' => [
                ['email' => $validated['email']],
            ],
            'template_uuid' => '709c7ee9-bbc9-4346-8284-6e83f525691f',
            'template_variables' => [
                'fname' => 'Simon',
            ],
        ];

       
        // Send email via Mailtrap API
        $response = Http::withToken('572c9443e4748848a61e8e1f9bab53e3')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://send.api.mailtrap.io/api/send', $payload);

        if ($response) {

            
        return response()->json(['message' => 'Thank you for subscribing on our news letter'], 200);

     }else{
         return response()->json(['message' => 'You have not submitted your form successfully']);
 
     }

   }
   


    /**
     * Display the specified resource.
     */
    public function show(Subcriber $subcriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcriberRequest $request, Subcriber $subcriber)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete_subscriber = Subcriber::find($id);
        $delete_subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber deleted successfully');
    }
 
}
