<?php

namespace App\Http\Controllers;

use App\Models\Drugs_category;
use Illuminate\Http\Request;

class DrugsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs_category = Drugs_category::all();
        if(!$drugs_category )
            return response()->json([
                'body'=> null
            ],200);
        return 
        $drugs_category ;
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
     * @param  \App\Models\Drugs_category  $drugs_category
     * @return \Illuminate\Http\Response
     */
    public function show(Drugs_category $drugs_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drugs_category  $drugs_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Drugs_category $drugs_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drugs_category  $drugs_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drugs_category $drugs_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drugs_category  $drugs_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drugs_category $drugs_category)
    {
        //
    }
}
