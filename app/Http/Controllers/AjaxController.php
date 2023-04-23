<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
class AjaxController extends Controller
{

    public function country_states()
    {
        if(request()->countryId && !is_null(request()->countryId) && !empty(request()->countryId)){

             $country = Country::where('_id',request()->countryId)->first();
             $states  = $country->states()->select('state_name','_id')->get()->toArray();
             return [
                        '_id'          => $country->_id,
                        'country_name' => $country->country_name,
                        'states'       => $states
                    ];
 
        } else {
                  return [];
               }
    }

    
}
