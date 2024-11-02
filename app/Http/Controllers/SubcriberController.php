<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Subcriber;
use Illuminate\Http\Request;

use App\Http\Requests\StoreSubcriberRequest;
use App\Http\Requests\UpdateSubcriberRequest;
use App\Mail\WelcomeMail;

class SubcriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addsubs = $request->validate([
            'email' => 'required',
        ]);
        $addsubs = Subcriber::create([
            'email' => $request->email,
        ]);
        $addsubs = Mail::to('Info@titranstech.co.uk')->send(new WelcomeMail($addsubs));
        // Mail::to($subcriber->email)->send(new WelcomeMail());
        if ($addsubs) {
            return response()->json(['message' => 'Form submitted successfully and email sent.'], 200);
    
        }else{
            return response()->json(['message' => 'Form not submitted successfully and email sent.']);
    
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
    public function destroy(Subcriber $subcriber)
    {
        //
    }
}
