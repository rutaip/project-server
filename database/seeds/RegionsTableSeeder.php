<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('regions')->insert([
            'region' => 'CALA',
        ]);


        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'Administrator',
        ]);


        DB::table('users')->insert([
            'name' => 'Admin',
            'last' => 'Presence',
            'email' => 'project@presenceco.com',
            'region_id' => '1',
            'password' => bcrypt('Pr3s3nc3'),
        ]);


        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);



    }
}
