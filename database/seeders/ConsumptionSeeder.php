<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consumption;
use DB;
class ConsumptionSeeder extends Seeder
{
    private $min_consumption;
    private $max_consumption;
    private $min_drugs_application;
    private $max_drugs_application;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //What should be changing
        $year = 2015;
        //Choose your customer id
        $customer_id = 1;

        $years_number = 1;

        $first_quater = 57;
        $first_quater_rise = 12;
        $first_quater_fall = 13;

        $second_quater = 54;
        $second_quater_fall = 5;

        $third_quater = 54;
        $third_quater_rise = 1;
        $third_quater_fall = 9;

        $fourth_quater = 57;
        $fourth_quater_fall = 8;

        $products = DB::select('select *from product');

        $this->min_consumption = 0;
        $this->max_consumption = 0;
        
        $this->min_drugs_application = 100;
        $this->max_drugs_application = 1000;
        for($customers_count = 1; $customers_count<=5; $customers_count++){
            for($month = 1; $month<=12; $month++){
                $quantity = 0;
                foreach($products as $product){
                    if($product->ven_status_id != "N"){
                        $this->fillConsumption($year, $month, $product, $customers_count);
                    }
                    else if($product->ven_status_id == "N" && rand()%3 == 0){
                        $this->fillConsumption($year, $month, $product, $customers_count);
                    }
                }
            }
        }

    
    }

    private function fillConsumption($year, $month, $product,$customer_id){
        $date = date_create(strval($year)."-".strval($month));

        //fill consumption
        if($this->isOrderFullfilled($year, $month,$product)){
            $quantity = mt_rand($this->min_consumption,$this->max_consumption);
        }
        else {
            $quantity = 0;
        }
        Consumption::create([
            'quantity' => $quantity,
            'product_id' => $product->item_code,
            'customer_id' => $customer_id,
            'created_at' => $date,
        ]);
    }

    private function isOrderFullfilled($year,$month,$product){
        $remainder = rand()%100;
        if($year == 2015){
            if($product->drugs_application_id  == 19){
                $this -> min_consumption = $this->min_drugs_application;
                $this->max_consumption = $this->max_drugs_application;
            }
            else{
                $this->min_consumption = $this->min_made_consumed(150000000);
                $this->max_consumption = $this->max_made_consumed(160533362);
            }            
            if($month <4 && $remainder < 57){
                return true;
            }
            else if(($month > 3 && $month <10) && $remainder < 63){
                return true;
            }
            else if($month > 9 && $remainder < 73){
                return true;
            } 
            return false;        
        }

        else if($year == 2016){
            if($product->drugs_application_id  == 19){
                $this -> min_consumption = $this->min_drugs_application;
                $this->max_consumption = $this->max_drugs_application;
            }
            else{
                 $this->min_consumption = $this->min_made_consumed(100000000);
                 $this->max_consumption = $this->max_made_consumed(126440444);
            } 
            if($month <4 && $remainder < 70){
                return true;
            }
            else if(($month > 3 && $month < 7) && $remainder < 63){
                return true;
            }
            else if(($month > 6 && $month <10) && $remainder < 64){
                return true;
            }
            else if($month > 9 && $remainder < 61){
                return true;
            }
            return false;
        }

        else if($year == 2017){
            if($product->drugs_application_id  == 19){
                $this -> min_consumption = $this->min_drugs_application;
                $this->max_consumption = $this->max_drugs_application;
            }
            else{
                $this->min_consumption = $this->min_made_consumed(150000000);
                $this->max_consumption = $this->max_made_consumed(1724413432);
            }
            if(($month <4 || $month > 9) && $remainder < 57){
                return true;
            }
            else if($remainder < 54){
                return true;
            }
            return false;
        }
        else if($year == 2018){
            if($product->drugs_application_id  == 19){
                $this -> min_consumption = $this->min_drugs_application;
                $this -> max_consumption = $this->max_drugs_application;
            }
            else{
                $this->min_consumption = $this->min_made_consumed(250000000);
                $this->max_consumption = $this->max_made_consumed(251389265);
            }
            
            

            return $this->makeDynamicOrder($remainder);
        } 
        else if($year == 2019){
            if($product->drugs_application_id  == 19){
                $this -> min_consumption = $min_drugs_application;
                $this->max_consumption = $max_drugs_application;
            }
            else{
                 $this->min_consumption = $this->min_made_consumed(200000000);
                 $this->max_consumption = $this->max_made_consumed(235352238);
            }
           
            
            
            return $this->makeDynamicOrder($remainder);
        }
    }

    private function makeDynamicOrder($remainder){
            $q1 = $this->makeNewQuarter($first_quater, $first_quater_rise, $first_quater_fall);
            $q2 = $second_quater -= $second_quater_fall;
            $q3 = $this->makeNewQuarter($third_quater, $third_quater_rise, $third_quater_fall);
            $q4 = $fourth_quater -= $fourth_quater_fall;

            if($month <4  && $remainder < $q1){
                return true;
            }
            else if(($month > 3 && $month < 7) && $remainder < $q2){
                return true;
            } else if(($month > 6 && $month < 10) && $remainder < $q3){
                return true;
            } else if($month > 9 && $remainder < $q4){
                return true;
            }
            return false;
    }

    private function makeNewQuarter($quarter, $addQuarter, $subQuarter){
        switch($this->isQuarterRiseOrFall()){
            case 0: $quarter += $addQuarter; 
            case 1: $quarter -= $subQuarter;
        }
        return $quarter;
    }

    private function isQuarterRiseOrFall(){
        $random = rand()%2;
        return $random;
    }

    private function min_made_consumed($min_sales){
        $min_made = $min_sales/(4*3*312*24);
        return $min_made;
    }

    private function max_made_consumed($max_sales){
        $max_made = $max_sales/(4*3*312*24);
        return $max_made;
    }
}
