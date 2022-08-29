<?php

namespace App\Http\Livewire;

use App\Models\Worksite;
use Livewire\Component;

class CircuitCardSection extends Component
{
    public $circuitNumber; 
    public $totalWorksites;
    public $totalPending;
    public $totalAuthorized;
    public $totalRefused;
    public $ghostUnits;

    public function mount()
    {
        $this->totalWorksites = Worksite::where('circuit_number', $this->circuitNumber)->count();
        $this->totalAuthorized = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '03 - Authorized')
        ->count();

        $this->totalPending = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '01 - Pending')
        ->count();

        $this->totalRefused = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '02 - Refused')
        ->count();
    }

    public function render()
    {
        return view('livewire.circuit-card-section', 
            compact(
               [ $this->totalWorksites,
                $this->totalAuthorized,
                $this->totalPending,
                $this->totalRefused,]
            ));
    }
}
