<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                

                'birth_date'  => null,
                'age'  => null,
                'contact_number'  => '09123456780',
                'civil_status'  => null,
                'gender'  => null,
                'address'  => null,
                


                'remember_token' => null,
                'role' => 'admin',
                'isRegistered' => true,
            
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
           
            
        ];

        User::insert($users);
    }
}
