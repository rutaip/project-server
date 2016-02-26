<?php

use Illuminate\Database\Seeder;

class PresenceModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->delete();

        $modules = array(
            array('name' => 'Presence Inbound'),              //1
            array('name' => 'Presence Outbound Prev'),        //2
            array('name' => 'Presence Outbound Prog'),                 //3
            array('name' => 'Presence Outbound Pred'),      //4
            array('name' => 'Presence Scripting'),                //5
            array('name' => 'Presence Intelligent Routing'),              //6
            array('name' => 'Presence Recording'),              //7
            array('name' => 'Presence Screen Recording'),          //8
            array('name' => 'Presence Mail Int.'),  //9
            array('name' => 'Presence Web Int.'),                 //10
            array('name' => 'Presence Custom Reports'),                     //11
            array('name' => 'Presence Supervisor'),                 //12
            array('name' => 'Presence Administrator'),               //13
            array('name' => 'Presence IVR'),               //14
        );
        DB::table('modules')->insert($modules);
    }
}
