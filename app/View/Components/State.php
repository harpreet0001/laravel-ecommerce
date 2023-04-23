<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\State as StateModel;
class State extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $states;
    public $fieldname;
    public $classes;
    public $selectedCountryId;
    public $selectedStateId;

    public function __construct($selectedCountryId = null,$selectedStateId = null,$fieldname="stateId" ,$classes="form-control")
    { 
       $this->states            = StateModel::query()
                                  ->where('countryId',$selectedCountryId)
                                  ->get();
       $this->selectedCountryId = $selectedCountryId;
       $this->selectedStateId   = $selectedStateId;
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
        return view('components.state')->with([
                  'states'            => $this->states,
                  'selectedCountryId' => $this->selectedCountryId,
                  'selectedStateId'   => $this->selectedStateId,
                  'fieldname'         => $this->fieldname,
                  'classes'           => $this->classes,
                ]);
    }

 
}
