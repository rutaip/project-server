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

        $regions = array(
            array('region' => 'CALA'),
            array('region' => 'USA'),
            array('region' => 'EMEA'),
            array('region' => 'Mexico'),
            array('region' => 'Brazil'),
        );

            DB::table('regions')->insert($regions);

        $acds = array(
            array('acd_type' => 'Avaya', 'version' => '9.2'),
            array('acd_type' => 'Opengate', 'version' => '9.2' ),
        );

        DB::table('acds')->insert($acds);

        $pms = array(
            array('first' => 'Presence', 'last' => 'Technology', 'email' => 'project@presenceco.com', 'region_id' => '1'),
        );

        DB::table('pms')->insert($pms);

        $partner = array(
            array('partner_name' => 'Presence Technology', 'partner_country' => 'Global', 'region_id' => '1'),
        );

        DB::table('partners')->insert($partner);

        $customer = array(
            array('customer_name' => 'Presence Technology', 'email' => 'project@presenceco.com', 'country' => 'Mexico', 'region_id' => '1'),
        );

        DB::table('customers')->insert($customer);


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
