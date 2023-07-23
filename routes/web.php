<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\homeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPublicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Models\Profile;
use Illuminate\Http\Response;

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

Route::get('/',[homeController::class,'index'])->name('homepage')->middleware('auth');
Route::get('/profiles',[ProfileController::class,'index'])->name('profile.index')->middleware('auth');
Route::get('/profile/create',[ProfileController::class,'newProfile'])->name('createNewProfile')->middleware('guest');;
Route::get('/profiles/{profile}',[ProfileController::class,'show'])->where('id','\d+')->name('profile.details');
Route::get('/settings',[InformationController::class,'index'])->name('settings.index');

Route::post('/profiles/create/store',[ProfileController::class,'store'])->name('store');

// Route::get('/profiles/create',[ProfileController::class,'create'])->name('profile.create');
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login')->middleware('guest');
Route::post('/loginAction',[LoginController::class,'loginAction'])->name('loginAction');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::delete('/destoryProfiles/{profile}',[ProfileController::class,'destroyProfile'])->name('destrpyProfile');
Route::get('/updateProfileForm',[ProfileController::class,'updateProfile'])->name('updateProfile');
Route::get('/profiles/{profile}/edit',[ProfileController::class,'updateProfile'])->name('updateProfile');
Route::put('/profiles/{profile}',[ProfileController::class,'updateProfileAction'])->name('updateProfileAction');
Route::get('/linkedin/HamzaAkkaoui',function () {
    return redirect()->away('https://www.linkedin.com/in/hamza-akkaoui-4954581ab/');
})->name('mylinkedin');


Route::get('/404',function () {
    abort(404);
})->name('errors404');

Route::resource('publications',PublicationController::class);