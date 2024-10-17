<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SepaMandateController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

/////// ORIGIN

Route::view('/', 'home')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::get('password/reset', Email::class)->name('password.request');

Route::get('password/reset/{token}', Reset::class)->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


// AWS Routes
// IMG Routes from aws
Route::get('/images/{tenant}/{filename}', [ImageController::class, 'show'])->name('image.show');

Route::get('/test-s3', function () {
    $exists = Storage::disk('s3')->exists('logo.png');
    return $exists ? 'Datei existiert' : 'Datei existiert nicht';
});

// AUTH SECTION BACKEND
Route::middleware(['auth', 'verified'])->group(function () {

    // Login Routes
    Route::post('logout', LogoutController::class)->name('logout');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');

    // Impersonation Routes
    Route::get('/leave-impersonation', [ImpersonationController::class, 'leave'])->name('leave-impersonation');


    Route::middleware(['restrict.tenant.access'])->group(function () {

        // Admin DashboardController
        Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');
        // SEPA Mandates
        Route::resource('/sepa-mandates', SepaMandateController::class)->except(['show']);
        Route::get('sepa-mandates', [SepaMandateController::class, 'index'])->name('sepa-mandates.index');
        Route::get('sepa-mandates/create', [SepaMandateController::class, 'create'])->name('sepa-mandates.create');
        Route::get('sepa-mandates/export/', [SepaMandateController::class, 'export'])->name('sepa-mandates.export');
        Route::get('admin/import-data', [AdminController::class, 'importDataView'])->name('admin.import-data');
    });




    // Dashboard Routes
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    // API Manager

    // Profile Routes
    Route::resource('profile', ProfileController::class)->except(['edit', 'update']);
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Tenant Routes
    Route::view('/tenant', 'tenant.edit')->name('tenant.index');
    Route::view('/tenants', 'tenant.index')->name('tenant.list');

    // Client Routes
    Route::resource('clients', ClientController::class);
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::get('clients/{base-service}/edit/delete-document', [ClientController::class, 'destroyDocument'])->name('clients.destroyDocument');

    // Team Routes
    Route::view('/team', 'users.team')->name('team.index');
    Route::view('/team/add-user', 'users.create')->name('users.create');
    Route::view('/team/add-tenant', 'users.create-tenant')->name('users.create-tenant');

    // Document Routes
    Route::resource('documents', DocumentController::class);
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('/documents/{tenant}/{filename}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/photos/{tenant}/{filename}', [DocumentController::class, 'showPhoto'])->name('photos.show');
});
