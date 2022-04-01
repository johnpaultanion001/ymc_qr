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
                'contact_number'  => null,
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
            [
                'id'             => 2,
                'name'           => 'Sample Patient',
                'email'          => 'user@user.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date'  => '2000-02-21',
                'age'  => 21,
                'contact_number'  => '09776668820',
                'civil_status'  => 'SINGLE',
                'gender'  => 'MALE',
                'address'  => 'ANTIPOLO CITY',
                
                'remember_token' => null,
                'role' => 'patient',
                'isRegistered' => false,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 3,
                'name'           => 'Sample Testing',
                'email'          => 'test@test.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date'  => '2000-02-21',
                'age'  => 21,
                'contact_number'  => '09776668820',
                'civil_status'  => 'SINGLE',
                'gender'  => 'MALE',
                'address'  => 'ANTIPOLO CITY',
                
                'remember_token' => null,
                'role' => 'patient',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 4,
                'name'           => 'Sample Testing2',
                'email'          => 'test1@test1.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date'  => '2000-02-21',
                'age'  => 21,
                'contact_number'  => '09776668820',
                'civil_status'  => 'SINGLE',
                'gender'  => 'MALE',
                'address'  => 'ANTIPOLO CITY',
                
                'remember_token' => null,
                'role' => 'patient',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        User::insert($users);
    }
}
