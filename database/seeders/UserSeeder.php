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
                'contact_number'  => '09776668821',
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
                'contact_number'  => '09776668822',
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

            // assistant doctor account
            [
                'id'             => 5,
                'name'           => 'doctor1',
                'email'          => 'doctor1@doctor1.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987501',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 6,
                'name'           => 'doctor2',
                'email'          => 'doctor2@doctor2.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987502',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 7,
                'name'           => 'doctor3',
                'email'          => 'doctor3@doctor3.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987503',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 8,
                'name'           => 'doctor4',
                'email'          => 'doctor4@doctor4.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987555',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 9,
                'name'           => 'doctor5',
                'email'          => 'doctor5@doctor5.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987515',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 10,
                'name'           => 'doctor6',
                'email'          => 'doctor6@doctor6.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987538',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 11,
                'name'           => 'doctor7',
                'email'          => 'doctor7@zPiaTbYwkdoctor7.com',
                'password'       => '$2y$10$xYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987735',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 12,
                'name'           => 'doctor8',
                'email'          => 'doctor8@doctor8.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125984535',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 13,
                'name'           => 'doctor9',
                'email'          => 'doctor9@doctor9.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987535',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 14,
                'name'           => 'doctor10',
                'email'          => 'doctor10@doctor10.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125985535',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 15,
                'name'           => 'doctor11',
                'email'          => 'doctor11@doctor11.com',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896',//password
                
                'birth_date' => null,
                'age'  => null,
                'contact_number'  => '09125987595',
                'civil_status' => null,
                'gender'  => null,
                'address'  => null,
                
                'remember_token' => null,
                'role' => 'doctor',
                'isRegistered' => true,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        User::insert($users);
    }
}
