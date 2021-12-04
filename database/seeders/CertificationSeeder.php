<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Certification;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certification::factory()->count(10)->create()
            ->each(function ($certification) {
                $certification->event()->save(Event::factory()->make());
            });
    }
}
