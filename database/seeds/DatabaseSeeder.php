<?php

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
        $this->call(RolesTableSeeder::class);
        $this->call(AdminMasterSeeder::class);
        $this->call(AdminBarangSeeder::class);
        $this->call(AdminPengirimSeeder::class);
    }
}
