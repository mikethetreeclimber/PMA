<?php

use Illuminate\Support\Facades\
{
    Auth,
    Http,
    Request,
    Route
};
use App\Http\Controllers\
{
    AdminController,
    CircuitsController,
    HomeController
};
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// $response = Http::get('https://www2.alleghenycounty.us/RealEstate/Tax.aspx?ParcelID=0378N00152000000');
// dd(json_encode($response->body()));
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/import-new-data-form', [AdminController::class, 'import'])->name('import');

Route::get('/circuits/{circuit}', [CircuitsController::class, 'index'])->name('circuits');


Auth::routes();

