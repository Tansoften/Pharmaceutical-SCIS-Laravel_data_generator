<?php

namespace App\Http\Controllers;

use App\Models\Drugs_application;
use Illuminate\Http\Request;

class DrugsApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $drugs_application = Drugs_application::all();
        if(! $drugs_application)
            return response()->json([
                'body'=> null
            ],200);
        return 
        $drugs_application;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drugs_application  $drugs_application
     * @return \Illuminate\Http\Response
     */
    public function show(Drugs_application $drugs_application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drugs_application  $drugs_application
     * @return \Illuminate\Http\Response
     */
    public function edit(Drugs_application $drugs_application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drugs_application  $drugs_application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drugs_application $drugs_application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drugs_application  $drugs_application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drugs_application $drugs_application)
    {
        //
    }
}
