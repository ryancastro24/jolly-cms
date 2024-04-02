<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {


    Route::get('/caradmin', [CarController::class, "cars"])->name("caradmin");
   
    Route::post('/caradmin', [CarController::class, "storeCar"])->name("registerCaradmin");
    Route::post('/logout', [AuthController::class, "logout"])->name("logout");

    
});


Route::post('/admin', [AuthController::class, "registerSave"])->name("registerDealear");


Route::get('/vehicles', [CarController::class, "dashboard"])->name("vehicles");

Route::post('/login', [AuthController::class, "loginAction"])->name("login");
Route::post('/registercustomer', [AuthController::class, "registercustomer"])->name("registercustomer");


Route::get('/targetcar/{id}', [CarController::class, "cardetial"])->name("cardetail");






Route::get('/', function () {
    $cars = DB::table('inventories')
        ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
        ->join('users', 'vehicles.dealer_id', '=', 'users.id')
        ->join('mymodels', 'vehicles.mymodel_id', '=', 'mymodels.mymodel_id')
        ->join('options', 'mymodels.option_id', '=', 'options.option_id')
        ->join('brands', 'mymodels.brand_id', '=', 'brands.brand_id')
        ->select(
            "inventories.inventory_id",
            'mymodels.name as model_name',
            'mymodels.body_style',
            'vehicles.price',
            'vehicles.image',
            'options.color',
            'options.transmission',
            'options.engine',
            DB::raw('brands.name as brand_name'),

        )
        ->get();

    return view('welcome', compact("cars"));
})->name('home');

Route::get('/dealers', function () {

    $users = User::all();

    return view('pages.dealers',compact('users'));

})->name('dealers');


Route::get('/login', function () {
    return view('pages.login');
})->name('login');


Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');



Route::get('/customer', function () {
    return view('pages.customer');
})->name('customer');

Route::get('/thankyou', function () {
    return view('pages.thankyou');
})->name('thankyou');


Route::get('/contact',function() {

    return view('pages.contact');
})->name('contact');