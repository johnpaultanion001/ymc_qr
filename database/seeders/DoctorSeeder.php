<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DayDoctor;
use App\Models\TimeDoctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
                'id'             => 1,
                'user_id'     => 5,
                'service_id'     => 1,
                'name'     => 'Doc Orthopedics',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 2,
                'user_id'     => 6,
                'service_id'     => 2,
                'name'     => 'Doc OB-GYNE',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 3,
                'user_id'     => 7,
                'service_id'     => 3,
                'name'     => 'Doc Pediatrics',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 4,
                'user_id'     => 8,
                'service_id'     => 4,
                'name'     => 'Doc General Surgery',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 5,
                'user_id'     => 9,
                'service_id'     => 5,
                'name'     => 'Doc Internal Medicine',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 6,
                'user_id'     => 10,
                'service_id'     => 6,
                'name'     => 'Doc Dental',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 7,
                'user_id'     => 11,
                'service_id'     => 7,
                'name'     => 'Doc Infectious Disease',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 8,
                'user_id'     => 12,
                'service_id'     => 8,
                'name'     => 'Doc Ophthtalmology',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 9,
                'user_id'     => 13,
                'service_id'     => 9,
                'name'     => 'Doc Medico Legal',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 10,
                'user_id'     => 14,
                'service_id'     => 10,
                'name'     => 'Doc RT-PCR TEST',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
            [
                'id'             => 11,
                'user_id'     => 15,
                'service_id'     => 11,
                'name'     => 'Doc LABORATORY TEST',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
               
            ],
        ];

        $days = [
            //Doctor 1
            [
                'doctor_id'         => 1,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //Doctor 2
            [
                'doctor_id'         => 2,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 3
             [
                'doctor_id'         => 3,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 4
             [
                'doctor_id'         => 4,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 5
             [
                'doctor_id'         => 5,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 6
             [
                'doctor_id'         => 6,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 7
             [
                'doctor_id'         => 7,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 8
             [
                'doctor_id'         => 8,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 9
             [
                'doctor_id'         => 9,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 10
             [
                'doctor_id'         => 10,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
              //Doctor 11
              [
                'doctor_id'         => 11,
                'day'               =>  'Mon',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'day'               =>  'Wed',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'day'               =>  'Fri',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $times = [
            //Doctor 1
            [
                'doctor_id'         => 1,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 1,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //Doctor 2
            [
                'doctor_id'         => 2,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 2,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 3
             [
                'doctor_id'         => 3,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 3,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 4
             [
                'doctor_id'         => 4,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 4,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 5
             [
                'doctor_id'         => 5,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 5,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 6
             [
                'doctor_id'         => 6,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 6,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 7
             [
                'doctor_id'         => 7,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 7,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 8
             [
                'doctor_id'         => 8,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 8,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 9
             [
                'doctor_id'         => 9,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 9,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 10
             [
                'doctor_id'         => 10,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 10,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
             //Doctor 11
             [
                'doctor_id'         => 11,
                'time'              => '10:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '10:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '11:00 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '11:30 AM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '12:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '12:30 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'doctor_id'         => 11,
                'time'              => '1:00 PM',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        Doctor::insert($doctors);
        DayDoctor::insert($days);
        TimeDoctor::insert($times);
    }
}
