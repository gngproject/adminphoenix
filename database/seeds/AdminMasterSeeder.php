<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Admin Master',
            'email'     => 'adminmaster@phoenix.test',
            'password'  =>  bcrypt('phoenix123'),
        ]);

        $user->assignRole('admin_master');
    }
}
