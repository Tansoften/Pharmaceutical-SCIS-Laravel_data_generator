<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use Illuminate\Http\Request;
use DB;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$consumption = Consumption::all()->take(2);
         $consumptions = DB::select("select consumptions.id,quantity,date_recorded,customer_id,
          product_id,drugs_applications.id as drugs_application_id,drugs_categories.id as drugs_category_id,
          ven_statuses.id as ven_status_id,zones.id as zone_id from consumptions,customers,products,drugs_applications,groups_zones,
          drugs_categories,ven_statuses,zones 
          where consumptions.product_id=products.item_code 
          and products.drugs_application_id = drugs_applications.id and products.drug_category_id = drugs_categories.id 
          and products.ven_status_id = ven_statuses.id and consumptions.customer_id = customers.id 
          and customers.groups_zone_id = groups_zones.id and groups_zones.zone_id= zones.id
           ORDER BY consumptions.date_recorded ASC");
        if(! $consumptions)
            return response()->json([
                'body'=> null
            ],200);
        return 
        $consumptions;
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
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function show(Consumption $consumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumption $consumption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumption $consumption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumption $consumption)
    {
        //
    }
}
