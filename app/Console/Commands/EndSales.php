<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sale;
use App\Product;
use Carbon;

class EndSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is fired daily at 23:59 to end sales';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $today= Carbon::today()->toDateString();
        $sales = Sale::whereDate('ending_date', '=', $today)->get();
        // $sales = Sale::where('id', '=', 1)->get();
        foreach ($sales as $sale) {
                   
            $products = $sale->products;        
        
                foreach ($products as $onsale) {
                        $onsale['sale_id'] = NULL ;
                        $onsale->save();
                        }
            $sale->delete(); 
        }//outer foreach




        // //Restore For Testing purpose
        // $sales = Sale::onlyTrashed()->get();
        // foreach ($sales as $sale) {
        //  $sale->restore(); 
        // }
        // //Restore For Testing purpose
        


        // \Log::info('sales returned: ' .$sales. 'Time: ' . Carbon::now());

    }//handle






}//class
