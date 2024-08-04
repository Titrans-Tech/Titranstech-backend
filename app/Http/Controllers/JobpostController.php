<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Http\Requests\StoreJobpostRequest;
use App\Http\Requests\UpdateJobpostRequest;

class JobpostController extends Controller
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
    public function store(StoreJobpostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobpost $jobpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobpostRequest $request, Jobpost $jobpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobpost $jobpost)
    {
        //
    }
}
