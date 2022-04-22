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
    private $first_quater;
    private $first_quater_rise;
    private $first_quater_fall;
    private $second_quater;
    private $second_quater_fall;

    private $third_quater;
    private $third_quater_rise;
    private $third_quater_fall;

    private $fourth_quater;
    private $fourth_quater_fall;

    //Dynamic quarters
    private $q1 = 61;
    private $q2 = 60;
    private $q3 = 60;
    private $q4 = 64;

    //Auto generated sales
    private $salesBefore2015 = array(
        "2014"=>133242914,
        "2013"=>110591619,
        "2012"=>142663188,
        "2011"=>184035513,
        "2010"=>152749476,
        "2009"=>126782065,
        "2008"=>105229114,
        "2007"=>87340164,
        "2006"=>72492336,
        "2005"=>60168639,
        "2004"=>49939970,
        "2003"=>41450175,
        "2002"=>53470726,
        "2001"=>44380703,
    );
    private $salesAfter2019  = array(
        "2020"=>268301551,
        "2021"=>158297915,
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_id = 5;

        $products = DB::select('select *from product');

        $this->min_consumption = 1;
        $this->max_consumption = 0;

        // $this->loadSalesBefore();
        // $this->loadSalesAfter();
        
        $this->startSeeding($customer_id, $products);
    }

    private function startSeeding($customer_id, $products){
        for($year =2015; $year<=2019; $year++){
            for($month = 1; $month<=12; $month++){
                $quantity = 0;
                foreach($products as $product){
                    if($product->ven_status_id != "N"){
                        $this->fillConsumption($year, $month, $product, $customer_id);
                    }
                    else if($product->ven_status_id == "N" && rand()%3 == 0){
                        $this->fillConsumption($year, $month, $product, $customer_id);
                    }
                }
            }  
        }
    }

    private function loadSalesAfter(){
        $year_sales = 235352238;
        $avg_sale_rise = 0.41;
        $avg_sale_fall = 0.14;

        for($year=2020; $year <= 2021; ++$year){
            $rise_fall_chance = rand(1,3);
            
            if($rise_fall_chance < 3){
                $year_sales = ($year_sales*$avg_sale_fall)+$year_sales;
            } else {
                $year_sales = $year_sales-($avg_sale_rise*$year_sales);
            }
            $this->salesAfter2019[strval($year)] = $year_sales;
            print("Year:".$year."; Sales:".$year_sales."\n");
        }

        
        //print($this->salesAfter2019["2021"]);
    }

    private function loadSalesBefore(){
        $year_sales = 160533632;
        $avg_sale_rise = 0.17;
        $avg_sale_fall = 0.29;

        for($year=2014; $year > 2000; --$year){
            $rise_fall_chance = rand(1,3);
            
            if($rise_fall_chance > 2){
                $year_sales = ($year_sales*$avg_sale_fall)+$year_sales;
            } else {
                $year_sales = $year_sales-($avg_sale_rise*$year_sales);
            }
            $this->salesBefore2015[strval($year)] = $year_sales;
            print("Year:".$year."; Sales:".$year_sales."\n");
        }

        //print($this->salesBefore2015["2001"]);
    }

    private function fillConsumption($year, $month, $product,$customer_id){
        $date = date_create(strval($year)."-".$month."-".cal_days_in_month(CAL_GREGORIAN,$month,$year)-mt_rand(0,4));

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
            'date_recorded' => $date,
        ]);
    }

    private function isOrderFullfilled($year,$month,$product){
        $remainder = rand()%100;

        if($year < 2015){
            $this->max_consumption = $this->max_made_consumed($this->salesBefore2015[strval($year)], $product);
            return $this->makeDynamicOrder($remainder, $month);
        }
        else if($year == 2015){

                //$this->min_consumption = $this->min_made_consumed(150000000, $product);
                $this->max_consumption = $this->max_made_consumed(160533362, $product);
                      
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

                 //$this->min_consumption = $this->min_made_consumed(100000000, $product);
                 $this->max_consumption = $this->max_made_consumed(126440444, $product);
            
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
 
                //$this->min_consumption = $this->min_made_consumed(150000000, $product);
                $this->max_consumption = $this->max_made_consumed(1724413432, $product);
            
            if(($month <4 || $month > 9) && $remainder < 57){
                return true;
            }
            else if($remainder < 54){
                return true;
            }
            return false;
        }
        else if($year == 2018){
  
                //$this->min_consumption = $this->min_made_consumed(250000000, $product);
                $this->max_consumption = $this->max_made_consumed(251389265, $product);
            return $this->makeDynamicOrder($remainder,$month);
        } 
        else if($year == 2019){
  
            //$this->min_consumption = $this->min_made_consumed(200000000, $product);
            $this->max_consumption = $this->max_made_consumed(235352238, $product); 
            return $this->makeDynamicOrder($remainder, $month);
        }
        else if($year > 2019){
            $this->max_consumption = $this->max_made_consumed($this->salesAfter2019[strval($year)], $product);
            return $this->makeDynamicOrder($remainder, $month);
        }
    }

    private function makeDynamicOrder($remainder, $month){
            if($month <4  && $remainder < $this->q1){
                return true;
            }
            else if(($month > 3 && $month < 7) && $remainder < $this->q2){
                return true;
            } else if(($month > 6 && $month < 10) && $remainder < $this->q3){
                return true;
            } else if($month > 9 && $remainder < $this->q4){
                return true;
            }
            return false;
    }

    private function max_made_consumed($max_sales, $product){
        if($product->drugs_application_id  == 19){
            $max_made = $max_sales/(4*3*312*337);
        }
        else{
            $max_made = $max_sales/(4*3*312*24);
        }
        return $max_made;
    }
}
