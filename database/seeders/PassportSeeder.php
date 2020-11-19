<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')
            ->insert([
                [
                    'id' => env('GRAND_USER_ID'),
                    'name' => 'Password Grant Client User',
                    'secret' => env('GRAND_USER'),
                    'provider' => 'users',
                    'redirect' => 'http://localhost',
                    'personal_access_client' => 0,
                    'password_client' => 1,
                    'revoked' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
    }
}
