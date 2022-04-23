<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Consumption;
use App\Models\DWConsumptions;
use App\Models\Customer;
use App\Models\GroupsZones;
use App\Models\Product;
use App\Models\DimDate;

class DWConsumptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consumptions = Consumption::orderBy("date_recorded")->get();
        

        foreach($consumptions as $consumption){
            //Find group and zone 
            $customer = Customer::find($consumption->customer_id);
            $groupsZones = GroupsZones::find($customer->groups_zone_id);

            //Find product because we need it's application, category and ven status
            try{
                $product = Product::where("item_code", $consumption->product_id)->first();

                if(!$product){
                    print("Product with item code".$consumption->product_id." was not found!");
                }else{
                    $date   = explode("-", $consumption->date_recorded);
                    $year   = $date[0];
                    $month  = $date[1];
                    $day    = $date[2];

                    $date = DimDate::firstOrCreate(
                        [
                            "year"  => $year,
                            "month" => $month,
                            "day"   => $day,
                        ]
                    );
                    
                    DWConsumptions::create(
                        [
                            "quantity"              => $consumption->quantity,
                            "customer_id"           => $consumption->customer_id,
                            "product_id"            => $consumption->product_id,
                            "zone_id"               => $groupsZones->zone_id,
                            "group_id"              => $groupsZones->group_id,
                            "drugs_application_id"  => $product->drugs_application_id,
                            "ven_status_id"         => $product->ven_status_id,
                            "drugs_category_id"     => $product->drug_category_id,
                            "date"                  => $date->id,
                        ]
                    );
                }

                
            }catch(\Exception $e){
                print("Error: ".$e);
            }

        }
    }
}
