<?php

namespace App\Livewire\Api;

use App\Models\ApiToken;
use App\Models\Report;
use Livewire\Component;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowReport extends Component
{

    public $user;
    public $userId;

    public $api_token;
    public $tenantId;
    public $reports;


    public function mount($api_token, $user)
    {
        $this->user = $user;
        $this->reports = Report::where('tenant_id', $api_token->tenant_id)->get();
    }

    public function createReport($api_token, $user)
    {
        $api_token = (object) $api_token;

        $user = (object) $user;

        $tenantId = $api_token->tenant_id;

        $tenant = Tenant::where('id', $tenantId)->first();

        $users = User::where('tenant_id', $tenantId)->get();

        $userIds = $users->pluck('name')->toArray();
        $apiCounts = $users->pluck('api_calls_count')->toArray();


        $report = Report::create([
            'tenant_id' => $tenantId,
            'users' => json_encode($userIds),
            'api_calls_count' => json_encode($apiCounts),
            'title' => "$tenant->name's API Reports",
            'description' => 'Description about the report blabla',
            'created_at' => now(),
            'expires_at' => now(),
        ]);

        return redirect(request()->header('Referer'));
    }


    public function generateReport($id)
    {
        $report = Report::findOrFail($id);
        $fileName = 'report_' . $id . '.pdf';

        $pdf = PDF::loadView('documents.report', compact('report'));
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $fileName);
    }


    public function render()
    {
        return view('livewire.api.show-report', [
            'reports' => $this->reports,
        ]);
    }
}
