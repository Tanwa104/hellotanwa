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
use App\Http\Controllers\ViewProfileController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\BidviewController;
use App\Http\Controllers\BidMakeController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PropUserController;
use App\Http\Controllers\AcceptMailController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\BookhelpController;
 use App\Http\Controllers\RatingController;
 use App\Http\Controllers\HelpRateViewController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\AdminviewController;


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

Route::get('/loguser', function () {
    return view('loguser');
});

Route::get('/loghelp', function () {
    return view('loghelp');
});
Route::get('/bvcleanuser', function () {
    return view('bvcleanuser');
});
Route::get('/bvnannyuser', function () {
    return view('bvnannyuser');
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
Route::get('/reqcleanner', [ReqController::class, 'udclean'])->name('udclean.build');
Route::get('/reqnanny', [ReqController::class, 'udnanny'])->name('udnanny.build');
Route::get('/reqcook', [ReqController::class, 'udcook'])->name('udcook.build');
Route::get('/bvcleaner', [BidviewController::class, 'bvcleaner'])->name('bvcleaner.build');
Route::get('/bvnanny', [BidviewController::class, 'bvnanny'])->name('bvnanny.build');
Route::get('/bvcook', [BidviewController::class, 'bvcook'])->name('bvcook.build');

Route::get('/cleanhelp', [BidMakeController::class, 'cleanhelper'])->name('cleanhelper.build');


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
    Route::get('/udclean', function () {
        return view('cleanerreq');});
        Route::get('/nannyreq', function () {
            return view('nanny');});
            Route::get('/cookreq', function () {
                return view('cook');});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('/addmin-log', [AdminController::class, 'index'])->name('admin.log');
Route::get('/addmin-seen', [AdminController::class, 'create'])->name('admin.seen');
Route::get('/addmin-dash', [AdminviewController::class, 'view'])->name('admin.dashboard');

Route::get('/book-view', [bookcontroller::class, 'viewbook'])->name('booking.select');
Route::get('/viewpro/{id}', [ViewProfileController::class, 'index'])->name('viewpro.index');
Route::get('/cust-view/{id}', [CustController::class, 'view'])->name('cust.view');
Route::get('/addarea', [NewClientController::class, 'addarea'])->name('area.fill');
Route::get('/clientacc', [BookhelpController::class, 'bookhelp'])->name('bookhelp.fill');
Route::get('/acceptbook/{bid}', [BookhelpController::class, 'acceptbook'])->name('acceptbook.fill');
Route::get('/deniedbook{bid}', [BookhelpController::class, 'deniedbook'])->name('deniedbook.fill');
Route::get('/propindex/{id}/{tid}', [ProposalController::class, 'index'])->name('propindex.build');
Route::get('/propinsert/{id}', [ProposalController::class, 'makestore'])->name('makeprop.fill');
Route::get('/propsel', [PropUserController::class, 'propuser'])->name('propuser.select');
Route::get('/propview', [PropUserController::class, 'propuserview'])->name('propuser.build');
Route::get('/propsee/{tid}', [PropUserController::class, 'see_props'])->name('propsee.build');
Route::get('/book/{pid}', [bookcontroller::class, 'book'])->name('book');
Route::resource('edus', UsereditController::class);
Route::resource('edhelp', HelpeditController::class);
Route::resource('newc', NewClientController::class);
Route::resource('cust', CustController::class)->names(['index'=> 'user.build']);;
Route::resource('add', UserAddressController::class);
Route::resource('help', helpController::class)->names(['index'=> 'help.build']);;
Route::get('/rating/{bid}', [RatingController::class, 'add_rate'])->name('rate.build');
Route::get('/rate-see', [HelpRateViewController::class, 'view_rate'])->name('rate.see');
Route::get('/cleaner', [CleanerController::class, 'cleaner'])->name('clean');
Route::get('/nanny', [CleanerController::class, 'nanny'])->name('nanny');
Route::get('/cook', [CleanerController::class, 'cook'])->name('cook');
Route::get('/acctest', [AcceptMailController::class, 'accepttest']);
Route::get('/getotp', [OtpController::class, 'genotp'])->name('getotp.build');
Route::get('/otp-help', [OtpController::class,  'genotphelp'])->name('otphelp.build');



require __DIR__.'/auth.php';
