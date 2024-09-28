<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
   return view('welcome');
});

# Admin Route 
// Route::get('/admin', function () {
//     return view('admin.index');
// });

// Route::get('car',[CarController::class,'index']);

Route::resource('car', CarController::class);
Route::resource('rental', RentalController::class);

# Backend Route 
// Route::get('/backend', function () {
//     return view('backend.index');
// });

# prefix with middleware Route admin,user
// Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

// });

# prefix with middleware Route
// Route::prefix('admin')->middleware('admin')->group(function () {

// });

// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::resource('car', CarController::class);
//     Route::resource('rental', RentalController::class);
// });  

// Route::prefix('admin')->group(function () {
//     Route::resource('car', CarController::class);
//     Route::resource('rental', RentalController::class);
// });

// ============== Frontend Route ============== //

Route::get('/frontend', function () {
   return view('frontend.index');
});


# route group with prefix
Route::prefix('admin')->group(function () {
   Route::get('/dashboard', function () {
      return view('admin.index');
   });
});




// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.index');
//     });
// });