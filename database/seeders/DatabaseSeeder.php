<?php

namespace Database\Seeders;

use App\Models\HeadOffice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CertificationSeeder::class,
            JobSeeder::class,
            HeadOfficeSeeder::class,
        ]);
    }
}
