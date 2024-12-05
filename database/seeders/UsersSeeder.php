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
                'permission' => null
            ],
            [
                'id' => Str::uuid(),
                'email' => 'guru@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
                'permission' => null
            ],
            [
                'id' => Str::uuid(),
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Siswa',
                'permission' => null
            ],
            [
                'id' => Str::uuid(),
                'email' => 'walikelas@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Guru',
                'permission' => 'Wali kelas'
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'id' => $userData['id'],
                'email' => $userData['email'],
                'password' => $userData['password']
            ]);

            $user->assignRole($userData['role']);

            if (!empty($userData['permission'])) {
                $user->givePermissionTo($userData['permission']);
            }
        }

        $admin = [
            'user_id' => $users[0]['id'],
            'nama' => 'Akun Admin',
            'jk' => 'Laki-laki',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Admin::create($admin);

        $guru = [
            'user_id' => $users[1]['id'],
            'nama' => 'Akun Guru',
            'nuptk' => '918230123',
            'jk' => 'Laki-laki',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Teacher::create($guru);

        $walikelas = [
            'user_id' => $users[3]['id'],
            'nama' => 'Akun Wali Kelas',
            'nuptk' => '918230122',
            'jk' => 'Laki-laki',
            'tgl_lahir' => '2005-09-02',
            'status' => 'Aktif'
        ];
        Teacher::create($walikelas);
    }
}
