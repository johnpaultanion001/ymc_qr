<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'id'             => 1,
                'user_id' => '1',
                'image'           => 'a1.jpg',
                'title'           => 'Sample Vigil',
                'description' => 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
                'date' => '2022-12-08',
                'time' => '1:40 PM',
                'category' => "VIGIL",
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'user_id' => '1',
                'image'           => 'a1.jpg',
                'title'           => 'Sample Sport Fest',
                'description' => 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
                'date' => '2022-12-09',
                'time' => '1:40 PM',
                'category' => "SPORTS FEST",
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 3,
                'user_id' => '1',
                'image'           => 'a1.jpg',
                'title'           => 'Sample Mariology',
                'description' => 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
                'date' => '2022-12-10',
                'time' => '1:40 PM',
                'category' => "MARIOLOGY",
               
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
         
        ];

        Event::insert($events);
    }
}
