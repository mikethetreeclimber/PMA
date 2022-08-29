<?php

namespace App\Http\Livewire;

use App\Models\Worksite;
use Livewire\Component;

class DashboardCard extends Component
{
    public $projectTotalPending;
    public $projectTotalAuthorized;
    public $projectTotalRefused;
    public $projectTotalWorksites;

    protected $listeners = ['uploaded' => '$refresh'];

    public function mount()
    {
        $this->projectTotalWorksites = Worksite::count();
        $this->projectTotalPending = Worksite::where('status', '01 - Pending')->count();
        $this->projectTotalRefused = Worksite::where('status', '02 - Refused')->count();
        $this->projectTotalAuthorized = Worksite::where('status', '03 - Authorized')->count();

    }
    public function render()
    {
        return view('livewire.dashboard-card');
    }
}
