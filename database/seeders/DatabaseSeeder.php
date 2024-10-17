<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Jadwal::create([
        'hari' => 'sabtu',
        'jam_buka' => '203',
        'jam_tutup' => '2932',
        'admin_id' => 1,
      ]);

      Admin::create([
        ''
      ]);

    }
}
