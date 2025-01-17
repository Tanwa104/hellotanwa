<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustController;
use App\Http\Controllers\helpController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\UsereditController;
use App\Http\Controllers\HelpeditController;
use App\Http\Controllers\NewClientController;
use App\Http\Controllers\filtercontroller;


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
    return view('home');
});
Route::get('/useredit', function () {
    return view('useredit');
    
});
Route::get('/useraddedit', function () {
    return view('useraddedit');
    
    
});
Route::get('/useraddedit', function () {
    return view('useraddedit');
    
    
});
// Route::get('/userdash', function () {
//     return view('user_dash');
// });
Route::get('/userdash', [CustController::class, 'index']);
Route::get('/fliter', [filtercontroller::class, 'index'])->name('fliter');
Route::get('/filstrore', [filtercontroller::class, 'store'])->name('fliter.build');
Route::get('/filnanny', [filtercontroller::class, 'storenanny'])->name('filnanny.build');
Route::get('/filcook', [filtercontroller::class, 'storecook'])->name('filcook.build');

Route::get('/helpdash', function () {
    return view('help_dash');
    
    
});
Route::get('/filter', function () {
    return view('fliter')->name('fliter');
    
    
});
Route::get('/helpadd', function () {
    return view('auth.helpadd');
    
});
Route::get('/cleaner', function () {
    return view('cleaner')->name('cleaner') ;
    });
    Route::get('/newclients', function () {
        return view('newclients'); 
        });
Route::POST('/edhelp-change/{id}', [ HelpeditController::class, 'changes'])->name('edhelp.changes');
Route::get('/helperedit', function () {
    return view('helperedit');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/cust-view/{id}', [CustController::class, 'view'])->name('cust.view');
Route::resource('edus', UsereditController::class);
Route::resource('edhelp', HelpeditController::class);
Route::resource('newc', NewClientController::class);
Route::resource('cust', CustController::class)->names(['index'=> 'user.build']);;
Route::resource('add', UserAddressController::class);
Route::resource('help', helpController::class)->names(['index'=> 'help.build']);;
Route::get('/cleaner', [CleanerController::class, 'cleaner'])->name('clean');
Route::get('/nanny', [CleanerController::class, 'nanny'])->name('nanny');
Route::get('/cook', [CleanerController::class, 'cook'])->name('cook');
require __DIR__.'/auth.php';
