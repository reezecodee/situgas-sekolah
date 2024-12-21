<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Guru']);
        Role::firstOrCreate(['name' => 'Siswa']);
    }
}
