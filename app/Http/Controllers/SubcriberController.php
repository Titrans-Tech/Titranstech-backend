<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Subcriber;
use App\Http\Requests\StoreSubcriberRequest;
use App\Http\Requests\UpdateSubcriberRequest;

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
    public function store(StoreSubcriberRequest $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subcribers,email',
        ]);

        $subcriber = Subcriber::create([
            'email' => $request->email,
        ]);
        Mail::to($subcriber->email)->send(new WelcomeMail());
        return response()->json([
            'message' => 'Subscription successful.',
            'subcriber' => $subcriber,
        ], 201);
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
