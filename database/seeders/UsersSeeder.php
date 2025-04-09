<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Teacher;
use App\Models\User;
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
                'id' => Str::uuid(),
                'email' => 'admin@gmail.com',
                'nuptk_nis' => '19230825',
                'password' => bcrypt('12345678'),
                'role' => 'Admin',
            ],
            [
                'id' => Str::uuid(),
                'email' => 'guru@gmail.com',
                'nuptk_nis' => '19230826',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'id' => $userData['id'],
                'nuptk_nis' => $userData['nuptk_nis'],
                'email' => $userData['email'],
                'password' => $userData['password']
            ]);

            $user->assignRole($userData['role']);
        }

        $admin = [
            'user_id' => $users[0]['id'],
            'nama' => 'Akun Admin',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Admin::create($admin);

        $guru = [
            'user_id' => $users[1]['id'],
            'nama' => 'Akun Guru',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Teacher::create($guru);
    }
}
