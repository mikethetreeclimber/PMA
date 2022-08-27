<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worksite extends Model
{
    use HasFactory;

    protected $fillable = [
        'circuit_number',
        'work_site_id',
        'status',
        'owner_name',
        'address',
        'city',
        'state',
        'zip_code',
        'parcel_id',
        'completed_at_date',
        'created_at_date',
            ];
}
