<?php

namespace App\Http\Controllers;

use App\Models\Ven_status;
use Illuminate\Http\Request;

class VenStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ven_status = Ven_status::all();
        if(!$ven_status )
            return response()->json([
                'body'=> null
            ],200);
        return 
          $ven_status ;
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
     * @param  \App\Models\Ven_status  $ven_status
     * @return \Illuminate\Http\Response
     */
    public function show(Ven_status $ven_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ven_status  $ven_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Ven_status $ven_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ven_status  $ven_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ven_status $ven_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ven_status  $ven_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ven_status $ven_status)
    {
        //
    }
}
