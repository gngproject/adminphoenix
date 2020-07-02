<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Admin Barang',
            'email'     => 'adminbarang@phoenix.test',
            'password'  =>  bcrypt('phoenix456'),
        ]);

        $user->assignRole('admin_barang');
    }
}
