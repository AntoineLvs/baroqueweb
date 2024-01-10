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
            'email' => 'admin@elsenmedia.com',
            'name' => 'elsenmedia',
            'tenant_id' => null,
            'password' => bcrypt('h3londerasd'),
        ]);

        $antoine = User::factory()->create([
            'email' => 'antoine@elsenmedia.com',
            'name' => 'antoine',
            'tenant_id' => '1',
            'password' => bcrypt('homesteadsecret'),
          ]);

        $tenant = Tenant::factory()->count(3)->create();

        foreach (Tenant::all() as $tenant) {

            // Create Folder
            Storage::disk('local')->makeDirectory('tenants/'.$tenant->id);

            $tenant = User::factory()->count(2)->create([
                'tenant_id' => $tenant->id,
            ]);

        }

    }
}
