<?php

namespace App\Jobs;

use App\Models\ApiToken;
use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Jobs\GeneratePdfAndSendMail;


class   GenerateMonthlyInvoices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        try {
            $tenantIds = ApiToken::pluck('tenant_id')->unique();
            $users = User::whereIn('tenant_id', $tenantIds)->get();

            foreach ($users as $user) {
                $tenantId = $user->tenant_id;
                $api_token = ApiToken::where('tenant_id', $tenantId)->first();

                $this->createInvoice($api_token, $user);
            }
            GeneratePdfAndSendMail::dispatch();

            Log::info('Job is successful');
        } catch (\Exception $e) {
            Log::error('Job did not succeed: ' . $e->getMessage());
        }
    }

    private function createInvoice($api_token, $user)
    {
        $api_token = (object) $api_token;
        $user = (object) $user;
        $tenantId = $api_token->tenant_id;

        $tenant = Tenant::where('id', $tenantId)->first();
        $tokenType = TokenType::where('id', $api_token->token_type_id)->first();

        $invoice = Invoice::create([
            'tenant_id' => $tenantId,
            'invoice_number' => Invoice::max('id') + 1,
            'user_id' => $user->id,
            'api_call_count' => $user->api_calls_count,
            'api_call_cost' => $tokenType->api_call_cost,
            'monthly_cost' => $tokenType->monthly_cost,
            'total_bill' => $tokenType->api_call_cost *  $user->api_calls_count + $tokenType->monthly_cost,
            'description' => "Description Here : blabla",
            'created_at' => now(),
            'status' => '1',
        ]);

        return $invoice;
    }
}
