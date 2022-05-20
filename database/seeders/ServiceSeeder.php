<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'id'             => '1',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Orthopedics',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '2',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'OB-GYNE',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '3',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Pediatrics',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '4',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'General Surgery',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '5',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Internal Medicine',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '6',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Dental',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '7',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Infectious Disease',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '8',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Ophthtalmology',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '9',
                'category'       => 'MEDICAL SERVICES',
                'name'           => 'Medico Legal',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '10',
                'category'       => 'LABORATORY TEST',
                'name'           => 'RT-PCR TEST',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '11',
                'category'       => 'LABORATORY TEST',
                'name'           => 'DRUG TEST',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        Service::insert($services);
    }
}
