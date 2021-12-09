<?php

namespace Database\Seeders;

use App\Models\Address;
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


        Certification::factory()->count(50)->create()
            ->each(function ($certification) {
                Address::factory()->count(1)->create()->each(function ($address) use ($certification) {
                    $certification->event()->save(
                        Event::factory()->make([
                            'address_id' => $address->id,
                        ])
                    );
                });
            });
    }
}
