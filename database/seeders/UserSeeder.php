<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::factory()->create([
            'email' => 'antoine.lavenseau@gmail.com',
            'name' => 'admin',
            'tenant_id' => null,
            'password' => bcrypt('h3londerasd'),
        ]);

        User::factory()->create([
            'email' => 'baroque.web@gmail.com',
            'name' => 'Baroque Web',
            'tenant_id' => '1',
            'password' => bcrypt('Baroquew3b!'),
          ]);


        foreach (Tenant::all() as $tenant) {

            // Create Folder
            Storage::disk('local')->makeDirectory('tenants/'.$tenant->id);

             User::factory()->count(1)->create([
                'tenant_id' => $tenant->id,
                'role' => 'user',
            ]);

        }

    }
}
