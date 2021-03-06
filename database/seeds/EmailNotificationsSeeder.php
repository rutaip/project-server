<?php

use Illuminate\Database\Seeder;

class EmailNotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        DB::table('notifications')->delete();

        $permissions = array(
            array('label' => 'New Project', 'name' => 'user_new_project'),              //1
            array('label' => 'Region New Project', 'name' => 'region_new_project'),     //2
            array('label' => 'WW New Project', 'name' => 'ww_new_project'),             //3
            array('label' => 'Update Project', 'name' => 'user_update_project'),        //4
            array('label' => 'Region Update Project', 'name' => 'region_update_project'),        //5
            array('label' => 'WW Update Project', 'name' => 'ww_update_project'),        //6
            array('label' => 'New Offering', 'name' => 'user_new_offering'),             //7
            array('label' => 'Region New Offering', 'name' => 'region_new_offering'),    //8
            array('label' => 'WW New Offering', 'name' => 'ww_new_offering'),            //9
            array('label' => 'Update Offer', 'name' => 'user_update_offer'),             //10
            array('label' => 'Region Update Offer', 'name' => 'region_update_offer'),            //11
            array('label' => 'WW Update Offer', 'name' => 'ww_update_offer'),            //12
            array('label' => 'Comments', 'name' => 'user_new_comments'),                //13
            array('label' => 'Region Comments', 'name' => 'region_new_comments'),                //14
            array('label' => 'WW Comments', 'name' => 'ww_new_comments'),                //15
            array('label' => 'Integrations', 'name' => 'user_new_integrations'),        //16
            array('label' => 'Region Integrations', 'name' => 'region_new_integrations'),        //17
            array('label' => 'WW Integrations', 'name' => 'ww_new_integrations'),        //18
        
        );
        DB::table('notifications')->insert($permissions);

        DB::table('notification_user')->delete();

        $permission_role = array(
            array('notification_id' => '1', 'user_id' => '1'),
            array('notification_id' => '2', 'user_id' => '1'),
            array('notification_id' => '3', 'user_id' => '1'),
            array('notification_id' => '4', 'user_id' => '1'),
            array('notification_id' => '5', 'user_id' => '1'),
            array('notification_id' => '6', 'user_id' => '1'),
        );
        DB::table('notification_user')->insert($permission_role);

    }
}
