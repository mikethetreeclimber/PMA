<?php

namespace App\Http\Livewire\Admin;

use App\Models\ImportHistory;
use App\Models\Worksite;
use Livewire\Component;

class ImportNewDataForm extends Component
{
    public $worksiteImport;
    public $success = false;
    public $failure = false;

    public function updatedWorksiteImport()
    {

        try {
            Worksite::truncate();

            ImportHistory::create();
            foreach ($this->worksiteImport as  $worksite) {
                Worksite::create([
                    "circuit_number" => isset($worksite['Circuit Number']) ? $worksite['Circuit Number'] : '',
                    "work_site_id" => isset($worksite['Work Site ID']) ? $worksite['Work Site ID'] : '',
                    "status" => isset($worksite['Status']) ? $worksite['Status'] : '',
                    "owner_name" => isset($worksite['Owner Name']) ? $worksite['Owner Name'] : '',
                    "address" => isset($worksite['Address']) ? $worksite['Address'] : '',
                    "city" => isset($worksite['City']) ? $worksite['City'] : '',
                    "state" => isset($worksite['State']) ? $worksite['State'] : '',
                    "zip_code" => isset($worksite['Zip']) ? $worksite['Zip'] : '',
                    "parcel_id" => isset($worksite['PARCELID']) ? $worksite['PARCELID'] : '',
                    "completed_at_date" => isset($worksite['Complete Date']) ? $worksite['Complete Date'] : '',
                    "created_at_date" => isset($worksite['Create Date']) ? $worksite['Create Date'] : '',
                ]);
            }
            $this->success = true;
        } catch (\Throwable $th) {
            $this->failure = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.import-new-data-form');
    }
}
