<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $users = [
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Admin',
                'permission' => null
            ],
            [
                'email' => 'guru@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
                'permission' => null
            ],
            [
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Siswa',
                'permission' => null
            ],
            [
                'email' => 'ketuakelas@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Siswa',
                'permission' => 'Ketua kelas'
            ],
            [
                'email' => 'walikelas@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
                'permission' => 'Wali kelas'
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'id' => Str::uuid(),
                'email' => $userData['email'],
                'password' => $userData['password']
            ]);

            $user->assignRole($userData['role']); // Menetapkan role

            if (!empty($userData['permission'])) {
                $user->givePermissionTo($userData['permission']); // Menetapkan permission
            }
        }
    }
}
