<?php

namespace App\Http\Livewire;

use App\Models\Worksite;
use Livewire\Component;

class CircuitCardSection extends Component
{
    public $circuitNumber;
    public $ghostUnits;

    public function mount()
    {
        
    }

    public function render()
    {
        $totalWorksites = Worksite::where('circuit_number', $this->circuitNumber)->count();
        $totalAuthorized = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '03 - Authorized')
        ->count();

        $totalPending = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '01 - Pending')
        ->count();

        $totalRefused = Worksite::where('circuit_number', $this->circuitNumber)
        ->where('status', 'LIKE', '02 - Refused')
        ->count();

        return view('livewire.circuit-card-section', 
                compact('totalWorksites',
                'totalAuthorized',
                'totalPending',
                'totalRefused',)
            );
    }
}
