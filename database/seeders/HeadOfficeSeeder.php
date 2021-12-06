<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\HeadOffice;

class HeadOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::factory()->count(10)->create()->each(function ($address) {
            HeadOffice::factory()->create([
                'address_id' => $address->id,
            ]);
        });
    }
}
