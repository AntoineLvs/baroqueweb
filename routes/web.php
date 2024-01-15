<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BaseProductController;
use App\Http\Controllers\BaseServiceController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EngineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MapboxRecordController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\ProductOfferInquiryController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\VehicleController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Models\Engine;
use App\Models\Manufacturer;
use App\Models\Release;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


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

/////// ORIGN

Route::view('/', 'home')->name('home');
Route::view('check', 'check')->name('check');


Route::get('/get/products', [\App\Livewire\Locations\CreateLocation::class, 'getProducts'])->name('get.products');
Route::get('/get/services', [\App\Livewire\Locations\CreateLocation::class, 'getServices'])->name('get.services');


Route::get('/get/products', [\App\Livewire\Locations\EditLocation::class, 'getProducts'])->name('get.products');
Route::get('/get/services', [\App\Livewire\Locations\EditLocation::class, 'getServices'])->name('get.services');

// FIND ENGINES

Route::get('/check/engines', function (Request $request) {
    // getting initial selected values
    $selected = json_decode($request->get('selected', ''), true);

    return Engine::query()
        // searching when type in the select input
        ->when(
            $search = $request->get('search'),
            fn ($query) =>
            $query->where('name', 'like', "%{$search}%")
        )
        ->when(!$search && $selected, function ($query) use ($selected) {
            // selecting the initial selected values
            $query->whereIn('id', $selected)
                // or selecting the other users ordered by creation date
                ->orWhere(function ($query) use ($selected) {
                    $query->whereNotIn('id', $selected)
                        ->orderBy('created_at');
                });
        })
        ->limit(25)
        ->get()
        ->map(function (Engine $engine) {
            return [
                'id' => $engine->id,
                // Kombinieren von 'name' und 'data' für das Label
                'label' => "{$engine->name} - Hersteller: {$engine->manufacturer->name}"
            ];
        });
})->name('api.engines');
// FIND MANUFACTURERS

Route::get('/check/manufacturers', function (Request $request) {
    // getting initial selected values
    $selected = json_decode($request->get('selected', ''), true);

    return Manufacturer::query()
        // searching when type in the select input
        ->when(
            $search = $request->get('search'),
            fn ($query) =>
            $query->where('name', 'like', "%{$search}%")
        )
        ->when(!$search && $selected, function ($query) use ($selected) {
            // selecting the initial selected values
            $query->whereIn('id', $selected)
                // or selecting the other users ordered by creation date
                ->orWhere(function ($query) use ($selected) {
                    $query->whereNotIn('id', $selected)
                        ->orderBy('created_at');
                });
        })
        ->limit(65)
        ->get()
        // mapping to the expected format
        ->map(fn (Manufacturer $manufacturer) => $manufacturer->only('id', 'name'));
})->name('api.manufacturers');

// hub finder
Route::get('mapfinder/', [HubController::class, 'showMap'])->name('hub.showMap');
Route::get('find/{id}', [HubController::class, 'showPublicProfile'])->name('hub.showPublicProfile');

Route::get('find/', [LocationController::class, 'showLocationFinder'])->name('locations.find-locations-public');
Route::get('/find/locations/{id}', [LocationController::class, 'showLocationProfile'])->name('locations.profile-locations-public');
Route::get('/find/{tenant_id}', [LocationController::class, 'showTenantProfile'])->name('locations.profile-tenants');
Route::get('/find/products/{id}', [LocationController::class, 'showProducts'])->name('locations.show-products');

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

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Routes
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Login Routes
    Route::post('logout', LogoutController::class)->name('logout');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');

    // Admin DashboardController
    Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::put('admin/{location}/insert', [MapController::class, 'insertLocation'])->name('admin.insertLocation');
    Route::post('admin/{location}/queue', [AdminController::class, 'queueLocation'])->name('admin.queueLocation');

    // Profile Routes
    Route::resource('profile', ProfileController::class)->except(['edit', 'update']);
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Hub Routes
    Route::resource('hub', HubController::class);
    Route::get('hub', [HubController::class, 'index'])->name('hub.index');
    Route::get('hub/offer/{offer}', [HubController::class, 'show'])->name('hub.show');
    Route::get('hub/inquiry/{inquiry}', [HubController::class, 'showInquiry'])->name('hub.showInquiry');
    Route::get('addtobucket/{offer}', [HubController::class, 'addToBucket'])->name('add.to.bucket');
    Route::get('hub/createInquiry/{offer}', [ProductOfferInquiryController::class, 'createNew'])->name('product-offer-inquiries.createNew');
    Route::get('hub/createOffer/{inquiry}', [ProductOfferController::class, 'createNew'])->name('product-offers.createNew');

    // Tenant Routes
    //Route::resource('tenant', 'TenantController')->except(['edit', 'update']);
    Route::view('/tenant', 'tenant.edit')->name('tenant.index');

    // Team Routes
    Route::view('/team', 'users.team')->name('team.index');
    Route::view('/team/add-user', 'users.create')->name('users.create');
    Route::view('/team/add-tenant', 'users.create-tenant')->name('users.create-tenant');

    // Directory Routes
    Route::view('/directory', 'directory.index')->name('directory.index');
    Route::get('/directory/{tenant}', [DirectoryController::class, 'show'])->name('directory.show');

    // Impersonation Routes
    Route::get('/leave-impersonation', [ImpersonationController::class, 'leave'])->name('leave-impersonation');

    // Base Product Routes
    Route::resource('base-products', BaseProductController::class);
    Route::get('base-products', [BaseProductController::class, 'index'])->name('base-products.index');
    Route::get('base-products/create', [BaseProductController::class, 'create'])->name('base-products.create');
    Route::get('base-products/{base_product}/edit', [BaseProductController::class, 'edit'])->name('base-products.edit');

    // Product Type Routes
    Route::resource('product-types', ProductTypeController::class);
    Route::get('product-types', [ProductTypeController::class, 'index'])->name('product-types.index');
    Route::get('product-types/create', [ProductTypeController::class, 'create'])->name('product-types.create');
    Route::get('product-types/{product-type}/edit', [ProductTypeController::class, 'edit'])->name('product-types.edit');

    // Product Routes
    Route::resource('products', ProductController::class);
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/edit/delete-document', [ProductController::class, 'destroyDocument'])->name('products.destroyDocument');


    // Base Service Routes
    Route::resource('base-services', BaseServiceController::class);
    Route::get('base-services', [BaseServiceController::class, 'index'])->name('base-services.index');
    Route::get('base-services/create', [BaseServiceController::class, 'create'])->name('base-services.create');
    Route::get('base-services/{base-services}/edit', [BaseServiceController::class, 'edit'])->name('base-services.edit');
    Route::get('base-services/{base-service}/edit/delete-document', [BaseServiceController::class, 'destroyDocument'])->name('base-services.destroyDocument');

    // Services Routes
    Route::resource('services', ServiceController::class);
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get('services/{service}/edit/delete-document', [ServiceController::class, 'destroyDocument'])->name('services.destroyDocument');

    // Mapbox Routes
    Route::resource('mapbox', MapboxRecordController::class);
    Route::get('mapbox', [MapboxRecordController::class, 'index'])->name('mapbox.index');

    // Watchlist Routes
    Route::resource('bucket', BucketController::class);
    Route::get('bucket', [BucketController::class, 'index'])->name('bucket.index');

    // Product Offer Routes
    Route::get('product-offers/makePublicOrder', [ProductOfferController::class, 'createPublic'])->name('product-offers.createPublic');
    Route::resource('product-offers', ProductOfferController::class);
    Route::get('product-offers', [ProductOfferController::class, 'index'])->name('product-offers.index');
    Route::get('product-offers/create', [ProductOfferController::class, 'create'])->name('product-offers.create');
    Route::get('product-offers/editpublic/{product_offer}', [ProductOfferController::class, 'editPublic'])->name('product-offers.edit-public');
    Route::delete('product-offers/destroyPublicOffer/{product_offer}', [ProductOfferController::class, 'destroyPublicOffer'])->name('product-offers.destroyPublicOffer');
    Route::get('product-offers/createFromInquiry/{product_offer_inquiry}/', [ProductOfferController::class, 'createFromInquiry'])->name('product-offers.createFromInquiry');

    // Product Offer Inquiries Routes
    Route::resource('product-offer-inquiries', ProductOfferInquiryController::class);
    Route::get('product-offer-inquiries', [ProductOfferInquiryController::class, 'index'])->name('product-offer-inquiries.index');
    Route::get('product-offer-inquiries/create', [ProductOfferInquiryController::class, 'create'])->name('product-offer-inquiries.create');
    Route::get('product-offer-inquiries/showincoming/{product_offer_inquiry}', [ProductOfferInquiryController::class, 'incomingShow'])->name('product-offer-inquiries.incomingShow');
    Route::get('product-offer-inquiries/{product_offer_inquiry}', [ProductOfferInquiryController::class, 'show'])->name('product-offer-inquiries.show');
    Route::get('product-offer-inquiries/cancel/{product_offer_inquiry}', [ProductOfferInquiryController::class, 'cancel'])->name('product-offer-inquiries.cancel');

    // Order Routes
    Route::resource('orders', OrderController::class)->except(['edit', 'update']);
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');

    Route::get('orders/createFromHub/{offer}/', [OrderController::class, 'createFromHub'])->name('orders.createFromHub');

    // Project Routes
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');

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

    // Standard Routes
    Route::resource('standards', StandardController::class)->except(['show']);
    Route::get('standards', [StandardController::class, 'index'])->name('standards.index');
    Route::get('standards/create', [StandardController::class, 'create'])->name('standards.create');

    // Realeases Routes
    Route::resource('releases', ReleaseController::class)->except(['show']);
    Route::get('releases', [ReleaseController::class, 'index'])->name('releases.index');
    Route::get('releases/create', [ReleaseController::class, 'create'])->name('releases.create');

    // Location Routes
    Route::resource('locations', LocationController::class);
    Route::get('locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('locations/create', [LocationController::class, 'create'])->name('locations.create');

    // Map Routes
    //Route::resource('map', MapController::class);
    Route::view('/map', 'map.index')->name('map.index');
    Route::get('map/get', [MapController::class, 'getResponse'])->name('map.getResponse');
    Route::get('map/geo', [MapController::class, 'getGeoResponse'])->name('map.getGeoResponse');
    Route::put('map/insert', [MapController::class, 'insertLocation'])->name('map.insertLocation');

    // Document Routes
    Route::resource('documents', DocumentController::class);
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('/documents/{tenant}/{filename}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/photos/{tenant}/{filename}', [DocumentController::class, 'showPhoto'])->name('photos.show');

    //Route::get('/documents/{user}/{filename}', [DocumentController::class, 'show'])->name('documents.show');

});
