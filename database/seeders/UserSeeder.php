<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'namauser' => 'adam',
                'username' => 'admin',
                'password' => bcrypt ('123'),
                'idoutlet' =>'1',
                'role' => 'admin',
            ],
            [
                'namauser' => 'anis',
                'username' => 'kasir',
                'password' => bcrypt ('123'),
                'idoutlet' =>'3',
                'role' => 'kasir',
            ],
            [
                'namauser' => 'aan',
                'username' => 'owner',
                'password' => bcrypt ('123'),
                'idoutlet' =>'5',
                'role' => 'owner',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
