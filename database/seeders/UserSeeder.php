<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->hasDevices(3)->create();
        User::factory()->count(4)->hasDevices(2)->create();
        User::factory()->count(5)->hasDevices(1)->create();
    }
}
