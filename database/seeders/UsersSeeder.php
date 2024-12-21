<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
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
                'id' => Str::uuid(),
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Admin',
            ],
            [
                'id' => Str::uuid(),
                'email' => 'guru@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
            ],
            [
                'id' => Str::uuid(),
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Siswa',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'id' => $userData['id'],
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
            'nuptk' => '918230123',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Teacher::create($guru);
    }
}
