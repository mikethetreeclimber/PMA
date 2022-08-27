<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class AdminController extends Controller
{
    public function import()
    {
        return view('admin.import');
    }
}
