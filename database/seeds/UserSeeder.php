<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\Models\Admin::create([
            'username' => 'super_admin',
            'mobile' => '123456789',
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt('123456789'),
            'photo' => 'super_admin/image',
        ]);
        $user->attachRole('super_admin');

        $user = App\Models\Admin::create([
            'username' => 'admin',
            'mobile' => '123456',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'photo' => 'admin/image',
        ]);
        $user->attachRole('admin');

    }
}
