<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['role_name' => 'A'], ['description' => 'Administrator']);
        Role::firstOrCreate(['role_name' => 'C'], ['description' => 'Contributor']);
        Role::firstOrCreate(['role_name' => 'S'], ['description' => 'Subscriber']);
    }
} 