<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;

class MeetingController extends Controller
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
    public function store(StoreMeetingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
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
    public function destroy(Meeting $meeting)
    {
        //
    }
}
