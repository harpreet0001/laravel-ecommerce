<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Country as CountryModel;
class Country extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fieldname;
    public $countries;
    public $classes;
    public $selectedCountryId;

    public function __construct($selectedCountryId = null,$fieldname = 'countryId',$classes = 'form-control')
    {
       $this->countries         = CountryModel::all();
       $this->countries         = $this->moveOtherToEnd($this->countries->toArray());
       $this->selectedCountryId = $selectedCountryId;
       $this->fieldname         = $fieldname;
       $this->classes           = $classes;
    } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  

        return view('components.country')->with([
                  'countries'         => $this->countries,
                  'selectedCountryId' => $this->selectedCountryId,
                  'fieldname'         => $this->fieldname,
                  'classes'           => $this->classes,
                ]); 
    }

    public function moveOtherToEnd($array)
    {

        $uk_key = null; 
        $uk_val = null; 
        foreach ($array as $key => $value) 
        {
            if($value['country_name'] == 'United Kingdom')
            {
              $uk_key = $key; 
              $uk_val = $value; 
              break;
            }
        }
      
        if(!is_null($uk_key) && !is_null($uk_val))
        {
          $array_splice = array_splice($array,$uk_key,1);
          array_unshift($array, $uk_val);
        }

        return $array;
    }

 
}
