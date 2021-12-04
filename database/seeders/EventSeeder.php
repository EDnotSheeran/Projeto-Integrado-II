<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Certification;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()->count(10)->create();
        // ->each(function ($event) {
        //     $event->certfication()->save(Certification::factory()->make());
        // });
    }
}
