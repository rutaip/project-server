<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!');

        $this->call('PresenceModulesTableSeeder');
        $this->command->info('Seeded the Presence Modules!');

        $this->call('RegionsTableSeeder');
        $this->command->info('Seeded the Regions, acds, pms, partner, customer, admin role, admin user!, pm resource');

        $this->call('PermissionTableSeeder');
        $this->command->info('Seeded the permissions, to admin role, admin user!');


    }
}
