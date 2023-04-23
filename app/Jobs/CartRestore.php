<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CartRestore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if(auth()->check())
        {
           
            if(Cart::currentInstance() === 'default') 
            {
                $shoppingcart = DB::table('shoppingcart')->where(auth()->user()->id)->first();
                $content = [];

                if(Cart::count() > 0)
                {
                    foreach(Cart::content() as $item)
                    {
                        if(!is_null($item->model))
                        {

                            $content[] = [
                                            'productId' => $item->model->_id,
                                            'quantity'  => (int)$item->qty
                                         ];
                        }
                    }
                    
                    if(is_null($shoppingcart))
                    {   
                        $shoppingcart = DB::table('shoppingcart')->insert([

                            "identifier" => auth()->user()->_id,
                            "instance"   => Cart::currentInstance(),
                            'content'   => json_encode($content)

                        ]);
                    }
                    else
                    {
                        $shoppingcart = DB::table('shoppingcart')
                                          ->where('identifier', auth()->user()->_id)
                                          ->update([
                                                       'content' => json_encode($content)
                                                  ]);
                    }
                }
                else
                {
                    DB::table('shoppingcart')->where(auth()->user()->id)->delete();
                }
    
            }
        }
       
    }
}
