<?php

namespace App\Livewire\Api;

use Livewire\Component;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use App\Models\Engine;
use App\Models\Release;
use Illuminate\Support\Facades\Auth;
use Laragear\Clipboard\Facades\Clipboard;
use Livewire\Attributes\On;

class Code extends Component
{
    public $buttonColor;
    public $backgroundColor;
    public $fontColor;
    public $buttonFontColor;
    public $customLogoUrl;
    public $personalText;
    public $defaultLogoPath = 'https://xtl-freigaben.de/assets/img/xtl-logo.png';


    public $htmlButton = false;
    public $cssButton = false;
    public $jsButton = false;

    public $HtmlCode;
    public $CssCode;
    public $JsCode;

    public $apiToken;
    public $userId;
    public $tenantId;
    public $appUrl;


    public function mount()
    {

        $this->appUrl = config('app.url');
        $this->apiToken = session('apiToken', '');
        $this->userId = session('userId', '');
        $this->tenantId = session('tenantId', '');
        $user = Auth::user();


        $ciSettings = json_decode($user->ci_settings, true);

        $this->buttonColor = $ciSettings['buttonColor'] ?? '#5147e5';
        $this->backgroundColor = $ciSettings['backgroundColor'] ?? '#f8f9fb';
        $this->fontColor = $ciSettings['fontColor'] ?? '#000000';
        $this->buttonFontColor = $ciSettings['buttonFontColor'] ?? '#ffffff';
        $this->customLogoUrl = $ciSettings['customLogoUrl'] ?? 'https://xtl-freigaben.de/assets/img/xtl-logo.png';
        $this->personalText = $ciSettings['personalText'] ?? "Bitte Hersteller auswählen";
    }

    public function toggleHtml()
    {
        $this->htmlButton = !$this->htmlButton;
    }

    public function toggleCss()
    {
        $this->cssButton = !$this->cssButton;
    }

    public function toggleJs()
    {
        $this->jsButton = !$this->jsButton;
    }

    public function render()
    {

        $this->HtmlCode = view('livewire.code.html-code')->render();
        $this->CssCode = view('livewire.code.css-code')->render();
        $this->JsCode = view('livewire.code.js-code')->render();


        return view('livewire.api.code');
    }
}
