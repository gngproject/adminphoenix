<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminPengirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Admin Pengirim',
            'email'     => 'adminpengirim@phoenix.test',
            'password'  =>  bcrypt('phoenix789'),
        ]);

        $user->assignRole('admin_pengiriman');
    }
}
