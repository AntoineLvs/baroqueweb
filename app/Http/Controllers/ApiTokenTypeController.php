<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\View\View;
use Spatie\FlareClient\Api;

class ApiTokenTypeController extends Controller
{
    protected $listeners = ['reportCreated' => 'generateReport'];

    public function index(): View
    {
        $api_token_types = TokenType::latest()->paginate(25);

        return view('api-token-types.index', compact('api_token_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('api-token-types.create');
    }

    public function edit(TokenType $api_token_type): View
    {

        return view('api-token-types.edit', compact('api_token_type'));
    }

  

    public function destroy($api_token_type)
    {
        $api_token_type = TokenType::findOrFail($api_token_type);

        $api_token = ApiToken::where('token_type_id', $api_token_type->id)->first();

        $userId = $api_token->user_id;

        $api_token->delete();
        $api_token_type->delete();

        User::where('id', $userId)->update(['status' => 0]);

        return redirect()
            ->route('api-token-types.index')
            ->with('message', 'Api Token Type was deleted successfully.');
    }
}
