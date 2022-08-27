<?php

namespace App\Http\Controllers;

use App\Models\Worksite;
use Illuminate\Http\Request;

class CircuitsController extends Controller
{
    public function index($circuitNumber)
    {
        
        return view('circuit-table', [
            'circuitNumber' => $circuitNumber
            ]
        );

    }
}
