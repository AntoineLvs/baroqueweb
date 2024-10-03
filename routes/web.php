<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ApiTokenTypeController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BaseServiceController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EngineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MapboxRecordController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\SepaMandateController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubsiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\ContactForm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductFinderController;
use App\Http\Controllers\BaseProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ShippingController;

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
Route::view('check', 'check')->name('check');

Route::get('/get/products', [\App\Livewire\Locations\CreateLocation::class, 'getProducts'])->name('get.products');
Route::get('/get/services', [\App\Livewire\Locations\CreateLocation::class, 'getServices'])->name('get.services');

Route::get('/get/products', [\App\Livewire\Locations\EditLocation::class, 'getProducts'])->name('get.products');
Route::get('/get/services', [\App\Livewire\Locations\EditLocation::class, 'getServices'])->name('get.services');



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

// PUBLIC Order Routes


// PRODUCT FINDER
Route::get('product-finder/', [ProductFinderController::class, 'index'])->name('product-finder.index-public');
Route::get('request-product/{product}', [OrderController::class, 'createProductRequest'])->name('orders.public-product-request');

Route::get('find/', [LocationController::class, 'showLocationFinder'])->name('locations.locations-finder-public');

Route::get('/find/locations/{id}', [LocationController::class, 'showLocationProfile'])->name('locations.profile-locations-public');
Route::get('/find/{tenant_id}', [LocationController::class, 'showTenantProfile'])->name('locations.profile-tenants');
Route::get('/find/products/{id}', [LocationController::class, 'showProducts'])->name('locations.show-products');



// Subsite Routes
Route::get('efuel-today', [SubsiteController::class, 'efueltoday'])->name('check.efueltoday');

Route::view('legal-informations', 'legal-informations')->name('legal-informations');
Route::view('privacy', 'privacy')->name('privacy');
Route::view('imprint', 'imprint')->name('imprint');
Route::view('contact', 'contact')->name('contact');

Route::view('fuer-unternehmen', 'fuer-unternehmen')->name('fuer-unternehmen');

Route::get('sources-list', [SourceController::class, 'sourcesList'])->name('sourcesList');
Route::post('/contact', [ContactForm::class, 'submitForm']);




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
        Route::put('admin/{location}/insert', [MapController::class, 'insertLocation'])->name('admin.insertLocation');
        Route::post('admin/{location}/createqueue', [AdminController::class, 'queueLocation'])->name('admin.queueLocation');
        Route::post('admin/{location}/disablequeue', [AdminController::class, 'disableLocation'])->name('admin.disableLocation');
        Route::post('admin/queue-locations', [AdminController::class, 'queueAllLocations'])->name('admin.queueAllLocations');
        route::post('admin/export-tileset', [AdminController::class, 'exportDatasetToTileset'])->name('admin.exportDatasetToTileset');

        // API Dashboard
        Route::resource('/api-dashboard', ApiTokenController::class)->except(['show']);
        Route::get('/api-dashboard', [ApiTokenController::class, 'apiDashboard'])->name('api.api-dashboard');
        Route::resource('/api-token', ApiTokenController::class);
        Route::get('/api-token/{apiTokenId}/{userId}', [ApiTokenController::class, 'show'])->name('api-token.user.show');

        // API Token Types
        Route::resource('/api-token-types', ApiTokenTypeController::class)->except(['show']);
        Route::get('api-token-types', [ApiTokenTypeController::class, 'index'])->name('api-token-types.index');
        Route::get('api-token-types/create', [ApiTokenTypeController::class, 'create'])->name('api-token-types.create');
        // Standard Controller
        Route::resource('standards', StandardController::class)->except(['show']);
        Route::get('standards', [StandardController::class, 'index'])->name('standards.index');
        Route::get('standards/create', [StandardController::class, 'create'])->name('standards.create');

        // Base Product Routes
        Route::resource('base-products', BaseProductController::class);
        Route::get('base-products', [BaseProductController::class, 'index'])->name('base-products.index');
        Route::get('base-products/create', [BaseProductController::class, 'create'])->name('base-products.create');
        Route::get('base-products/{base_product}/edit', [BaseProductController::class, 'edit'])->name('base-products.edit');

        // Base Service Routes
        Route::resource('base-services', BaseServiceController::class);
        Route::get('base-services', [BaseServiceController::class, 'index'])->name('base-services.index');
        Route::get('base-services/create', [BaseServiceController::class, 'create'])->name('base-services.create');
        Route::get('base-services/{base-services}/edit', [BaseServiceController::class, 'edit'])->name('base-services.edit');
        Route::get('base-services/{base-service}/edit/delete-document', [BaseServiceController::class, 'destroyDocument'])->name('base-services.destroyDocument');

        // Mapbox Routes
        Route::resource('mapbox', MapboxRecordController::class);
        Route::get('mapbox', [MapboxRecordController::class, 'index'])->name('mapbox.index');

        // SEPA Mandates
        Route::resource('/sepa-mandates', SepaMandateController::class)->except(['show']);
        Route::get('sepa-mandates', [SepaMandateController::class, 'index'])->name('sepa-mandates.index');
        Route::get('sepa-mandates/create', [SepaMandateController::class, 'create'])->name('sepa-mandates.create');
        Route::get('sepa-mandates/export/', [SepaMandateController::class, 'export'])->name('sepa-mandates.export');
        Route::get('admin/import-data', [AdminController::class, 'importDataView'])->name('admin.import-data');




        // Shipping Routes
        Route::resource('shippings', ShippingController::class)->except(['update']);
        Route::get('shippings', [ShippingController::class, 'index'])->name('shippings.index');
        Route::get('shippings/create', [ShippingController::class, 'create'])->name('shippings.create');


        // Manufacturers Routes
        Route::resource('manufacturers', ManufacturerController::class)->except(['show']);
        Route::get('manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');
        Route::get('manufacturers/create', [ManufacturerController::class, 'create'])->name('manufacturers.create');

        // Engine Routes
        Route::resource('engines', EngineController::class)->except(['show']);
        Route::get('engines', [EngineController::class, 'index'])->name('engines.index');
        Route::get('engines/create', [EngineController::class, 'create'])->name('engines.create');

        // Vehicle Routes
        Route::resource('vehicles', VehicleController::class)->except(['show']);
        Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
        Route::get('vehicle/create', [VehicleController::class, 'create'])->name('vehicles.create');

        // Realeases Routes
        Route::resource('releases', ReleaseController::class)->except(['show']);
        Route::get('releases', [ReleaseController::class, 'index'])->name('releases.index');
        Route::get('releases/create', [ReleaseController::class, 'create'])->name('releases.create');

        // Directory Routes
        Route::view('/directory', 'directory.index')->name('directory.index');
        Route::get('/directory/{tenant}', [DirectoryController::class, 'show'])->name('directory.show');

        // Product Type Routes
        Route::resource('product-types', ProductTypeController::class);
        Route::get('product-types', [ProductTypeController::class, 'index'])->name('product-types.index');
        Route::get('product-types/create', [ProductTypeController::class, 'create'])->name('product-types.create');
        Route::get('product-types/{product-type}/edit', [ProductTypeController::class, 'edit'])->name('product-types.edit');



        Route::controller(ImportExportController::class)->group(function () {
            Route::get('admin/import_export', 'importExport');
            Route::post('admin/import', 'importData')->name('data.import');
            Route::get('admin-export/export', 'exportData')->name('data.export');
            // Route::post('admin/{event}/import-attendees', 'importEventAttendees')->name('eventAttendees.import');
            // Route::get('event/export-attendees', 'exportEventAttendees')->name('eventAttendees.export');
        });
    });




    // Dashboard Routes
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    // API Manager
    Route::get('api-manager', [ApiTokenController::class, 'index'])->name('api.manager');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/license-manager/', [ApiTokenController::class, 'licenseManager'])->name('api.license-manager');
    Route::get('/license-legal-informations/', [ApiTokenController::class, 'legalInformations'])->name('license-legal-informations');

    // Profile Routes
    Route::resource('profile', ProfileController::class)->except(['edit', 'update']);
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Tenant Routes
    Route::view('/tenant', 'tenant.edit')->name('tenant.index');
    Route::view('/tenants', 'tenant.index')->name('tenant.list');

    // Team Routes
    Route::view('/team', 'users.team')->name('team.index');
    Route::view('/team/add-user', 'users.create')->name('users.create');
    Route::view('/team/add-tenant', 'users.create-tenant')->name('users.create-tenant');


    // Product Routes
    Route::resource('products', ProductController::class);
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/edit/delete-document', [ProductController::class, 'destroyDocument'])->name('products.destroyDocument');

    // Services Routes
    Route::resource('services', ServiceController::class);
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get('services/{service}/edit/delete-document', [ServiceController::class, 'destroyDocument'])->name('services.destroyDocument');

    // Order Routes
    Route::resource('orders', OrderController::class)->except(['update']);
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');



    // Location Routes
    Route::resource('locations', LocationController::class);
    Route::get('locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::get('import-data', [ImportExportController::class, 'importData'])->name('locations.import-view');

    Route::post('locations-import/{tenant_id}', [ImportExportController::class, 'importLocations'])->name('locations.import');
    Route::post('admin-locations-import/', [ImportExportController::class, 'adminImportLocations'])->name('locations.admin-import');

    Route::get('locations-export', [ImportExportController::class, 'exportLocations'])->name('locations.export');
    Route::get('locations-download-template', [ImportExportController::class, 'downloadTemplate'])->name('locations.download-template');

    // Map Routes
    Route::get('my-map', [MapController::class, 'index'])->name('map.index');
    Route::get('map/get', [MapController::class, 'getResponse'])->name('map.getResponse');
    Route::get('map/geo', [MapController::class, 'getGeoResponse'])->name('map.getGeoResponse');
    Route::put('map/insert', [MapController::class, 'insertLocation'])->name('map.insertLocation');

    // Document Routes
    Route::resource('documents', DocumentController::class);
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('/documents/{tenant}/{filename}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/photos/{tenant}/{filename}', [DocumentController::class, 'showPhoto'])->name('photos.show');
});
