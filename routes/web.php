<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Rental;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============ Backend Route ============ //

// Route::get('admin', [AdminController::class, 'index'])->name('admin');

// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('admin');



// Frontend Route //
Route::get('home',[HomeController::class, 'index'])->name('home');

Route::get('/', [PageController::class, 'Page'])->name('page');
Route::get('about', [PageController::class, 'About'])->name('about');
Route::get('car', [PageController::class, 'AllCar'])->name('car');
Route::get('single-car/{car}', [PageController::class, 'SingleCar'])->name('single.car');
Route::get('rental', [PageController::class, 'Rental'])->name('rental');
Route::get('contact', [PageController::class, 'Contact'])->name('contact');
Route::get('login', [PageController::class, 'Login'])->name('login');
Route::get('signup', [PageController::class, 'Signup'])->name('signup');

//car Filter
Route::get('car/filter', [PageController::class, 'carFilter'])->name('car.filter');
Route::post('filter', [PageController::class, 'filter'])->name('filter');

//Browse Cars:
// Route::get('car/filter', [PageController::class, 'carFilter'])->name('cars.filter');
// Route::post('filter', [PageController::class, 'filter'])->name('filter');
Route::post('car-booking/{CarID}', [PageController::class, 'CarBooking'])->name('car.booking');


Route::get('/cars', [CarController::class, 'CarList']);
Route::post('/book-car', [BookingController::class, 'book'])->name('book.car');

// User Route //


// Admin Route //
//route prefix with middleware
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('home', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('car', CarController::class);
    Route::resource('rental', RentalController::class);
});



require __DIR__ . '/auth.php';
