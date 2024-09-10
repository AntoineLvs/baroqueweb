<?php

namespace App\Livewire\Tenant;

use App\Mail\AdminNotificationMail;
use App\Models\ApiToken;
use Illuminate\Support\Facades\Mail;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;

use Livewire\Attributes\Validate;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

use App\Models\TenantType;




class EditTenant extends Component
{

    use WithFileUploads;

    public $tenant_photo;
    public $tenant_photo_header;
    public $path;
    public $tenant_name;
    public $tenant_type;
    public $tenant_status;
    public $tenant_email;
    public $tenant_phone;
    public $tenant_website;
    public $tenant_street;
    public $tenant_zip;
    public $tenant_city;
    public $tenant_country = "DE";
    public $tenant_description;
    public $url_subsite;
    public $super;
    public $user;
    public $tenant;
    public $url;

    public function render()
    {
        //return view('livewire.tenant.edit');
        return view('livewire.tenant.edit-tenant', [
            'tenant_types' => TenantType::all(),
        ]);
    }

    public function mount()
    {
        $this->tenant_name = auth()->user()->Tenant->name;
        $this->tenant_type = auth()->user()->Tenant->tenant_type_id;
        $this->tenant_status = auth()->user()->Tenant->status;
        $this->tenant_email = auth()->user()->Tenant->email;
        $this->tenant_phone = auth()->user()->Tenant->phone;
        $this->tenant_website = auth()->user()->Tenant->website;
        $this->tenant_street = auth()->user()->Tenant->street;
        $this->tenant_zip = auth()->user()->Tenant->zip;
        $this->tenant_city = auth()->user()->Tenant->city;
        $this->tenant_country = auth()->user()->Tenant->country;
        $this->tenant_description = auth()->user()->Tenant->description;
        $this->url_subsite = auth()->user()->Tenant->url_subsite;

        $this->user = auth()->user();

        if (auth()->user()->Tenant) {
            $this->tenant = auth()->user()->Tenant;
        }


        $url = explode('/', $this->tenant->url_subsite);
        $this->url = end($url);
    }

    public function updateTenant(Request $request)
    {

        $tenant = auth()->user()->Tenant;

        $data = $this->validate([
            'tenant_name' => 'required|string|max:500',
            'tenant_email' => 'nullable|string|max:250',
            'tenant_phone' => 'nullable|string|max:250',
            'tenant_website' => 'nullable|string|max:250',
            'tenant_street' => 'nullable|string|max:250',
            'tenant_zip' => 'nullable|string|max:250',
            'tenant_city' => 'nullable|string|max:250',
            'tenant_country' => 'nullable|string|max:250',
            'tenant_description' => 'nullable|string|max:500',
        ]);


        $tenant->name = $this->tenant_name;
        $tenant->tenant_type_id = $this->tenant_type;
        $tenant->status = $this->tenant_status;
        $tenant->email = $this->tenant_email;
        $tenant->phone = $this->tenant_phone;
        $tenant->website = $this->tenant_website;
        $tenant->street = $this->tenant_street;
        $tenant->zip = $this->tenant_zip;
        $tenant->city = $this->tenant_city;
        $tenant->country = $this->tenant_country;
        $tenant->description = $this->tenant_description;
        $tenant->url_subsite = $this->url_subsite;

        $tenant->save();
        $tenant->fresh();

        if ($this->tenant_photo) {

            $this->validate([
                'tenant_photo' => 'image|max:4096', // 1MB Max
            ]);

            // Create Files
            $this->createPhoto($this->tenant_photo, $tenant);
        }

        if ($this->tenant_photo_header) {
            $this->validate([
                'tenant_photo_header' => 'image|max:4096', // 1MB Max
            ]);

            $this->createPhotoHeader($this->tenant_photo_header, $tenant);
        }

        $tenant->save();

        if ($tenant->hasCompleteProfile() == true) {
            $input = "Tenant wurde bearbeitet: " . $tenant->name . ' - T-ID: ' . $tenant->id;
            $subject = "Tenant wurde bearbeitet";

            Mail::to('info@xtl-freigaben.de')->send(new AdminNotificationMail($input, $subject));
        };

        session()->flash('message', 'Unternehmen aktualisiert.');
    }

    public function createPhoto($tenant_photo, $tenant): void
    {

        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($tenant_photo->getClientOriginalName(), PATHINFO_FILENAME)
            . '_' . now()->timestamp . '.' . $tenant_photo->getClientOriginalExtension();

        //dd($tenant_photo, $tenant, $filename);

        // store public s3
        $tenant_photo->storeAs('/images/' . $user->tenant_id . '/', $filename, 's3');
        $tenant->photo = $filename;
    }

    public function createPhotoHeader($tenant_photo_header, $tenant)
    {
        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->tenant_photo_header->getClientOriginalName(), PATHINFO_FILENAME)
            . '_' . now()->timestamp . '.' . $this->tenant_photo_header->getClientOriginalExtension();

        // store public s3
        $this->tenant_photo_header->storeAs('/images/' . $user->tenant_id . '/', $filename, 's3');
        $tenant->photo_header = $filename;
    }

    public function createPage()
    {
        $user = auth()->user();
        $tenant = $user->tenant;
        $url_subsite = explode('/', $tenant->url_subsite);
        $url_subsite = end($url_subsite);

        $data = $this->getUserData();

        $route = "Route::view('$url_subsite', 'tenant-views/$url_subsite')->name('$url_subsite');";

        // Add the route to the web.php file
        $webFilePath = base_path('routes/web.php');
        $routesContent = file_get_contents($webFilePath);
        $routesContent .= "\n" . $route;
        file_put_contents($webFilePath, $routesContent);

        // Read the contents of the template
        $templatePath = resource_path('views/tenant-views/template.blade.php');
        $templateContent = file_get_contents($templatePath);

        // Replace placeholders with dynamic data
        $replacedContent = str_replace(
            ['{{ $customLogoUrl }}', '{{ $personalText }}', '"{{ $buttonColor }}"', '"{{ $backgroundColor }}"', '"{{ $fontColor }}"', '"{{ $buttonFontColor }}"', '{{ $apiToken }}', '{{ $userId }}', '{{ $tenantId }}', '{{ $appUrl }}'],
            [$data['customLogoUrl'], $data['personalText'], $data['buttonColor'], $data['backgroundColor'], $data['fontColor'], $data['buttonFontColor'], $data['apiToken'], $data['userId'], $data['tenantId'], $data['appUrl']],
            $templateContent
        );

        // Write the view contents to the file
        $viewPath = resource_path('views/tenant-views/' . $url_subsite . '.blade.php');
        file_put_contents($viewPath, $replacedContent);

        // Update the tenant status
        $tenant->status = 1;
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    public function getUserData()
    {
        $user = auth()->user();
        $userId = $user->id;
        $tenantId = $user->tenant_id;

        $apiToken = ApiToken::where('tenant_id', $tenantId)->value('token');

        if ($user->ci_settings) {
            $ciSettings = json_decode($user->ci_settings, true, 256, JSON_THROW_ON_ERROR);
            $buttonColor = $ciSettings['buttonColor'] ?? '#5147e5';
            $backgroundColor = $ciSettings['backgroundColor'] ?? '#f8f9fb';
            $fontColor = $ciSettings['fontColor'] ?? '#000000';
            $buttonFontColor = $ciSettings['buttonFontColor'] ?? '#ffffff';
            $customLogoUrl = $ciSettings['customLogoUrl'] ?? 'https://xtl-freigaben.de/assets/img/xtl-logo.png';
            $personalText = $ciSettings['personalText'] ?? "Suchen Sie nach einer XTL Freigabe.";
        } else {

            $buttonColor = '#5147e5';
            $backgroundColor = '#f8f9fb';
            $fontColor = '#000000';
            $buttonFontColor = '#ffffff';
            $customLogoUrl = 'https://xtl-freigaben.de/assets/img/xtl-logo.png';
            $personalText = "Suchen Sie nach einer XTL Freigabe.";
        }

        $appUrl = config('app.url');

        return compact('buttonColor', 'backgroundColor', 'fontColor', 'buttonFontColor', 'customLogoUrl', 'personalText', 'apiToken', 'userId', 'tenantId', 'appUrl');
    }

    public function deletePage()
    {
        $user = auth()->user();
        $tenant = $user->tenant;
        $url_subsite = explode('/', $tenant->url_subsite);
        $url_subsite = end($url_subsite);

        // delete the view file
        $viewPath = resource_path('views/tenant-views/' . $url_subsite . '.blade.php');
        if (file_exists($viewPath)) {
            unlink($viewPath);
        }

        // delete the route in web.php
        $webFilePath = base_path('routes/web.php');
        $routesContent = file_get_contents($webFilePath);
        $routeToDelete = "Route::view('$url_subsite', 'tenant-views/$url_subsite')->name('$url_subsite');";

        // delete the ligne of the route
        $routesContent = str_replace($routeToDelete, '', $routesContent);
        // Remove empty lines from the deleted route
        $routesContent = preg_replace('/^\h*\v+/m', '', $routesContent);

        file_put_contents($webFilePath, $routesContent);

        // update the tenant status
        $tenant->status = 0;
        $tenant->save();

        return redirect()->route('tenant.index');
    }
}
