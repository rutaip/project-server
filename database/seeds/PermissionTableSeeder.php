<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array('label' => 'Site Admin', 'name' => 'admin'),              //1
            array('label' => 'View Partners', 'name' => 'partners'),        //2
            array('label' => 'View PMs', 'name' => 'poms'),                 //3
            array('label' => 'View Customers', 'name' => 'customers'),      //4
            array('label' => 'View ACDs', 'name' => 'acds'),                //5
            array('label' => 'View Users', 'name' => 'users'),              //6
            array('label' => 'View Roles', 'name' => 'roles'),              //7
            array('label' => 'View Regions', 'name' => 'regions'),          //8
            array('label' => 'View Permissions', 'name' => 'permissions'),  //9
            array('label' => 'Create', 'name' => 'create'),                 //10
            array('label' => 'Edit', 'name' => 'edit'),                     //11
            array('label' => 'Delete', 'name' => 'delete'),                 //12
            array('label' => 'Options', 'name' => 'options'),               //13
            array('label' => 'Catalog', 'name' => 'catalog'),               //14
            array('label' => 'Presence Modules', 'name' => 'modules'),      //15
            array('label' => 'View Comments', 'name' => 'comments'),        //16
            array('label' => 'Worldwide User', 'name' => 'worldwide'),        //17
            array('label' => 'View Resources', 'name' => 'resources'),        //18
        );
        DB::table('permissions')->insert($permissions);

        DB::table('permission_role')->delete();

        $permission_role = array(
            array('permission_id' => '1', 'role_id' => '1'),
            array('permission_id' => '2', 'role_id' => '1'),
            array('permission_id' => '3', 'role_id' => '1'),
            array('permission_id' => '4', 'role_id' => '1'),
            array('permission_id' => '5', 'role_id' => '1'),
            array('permission_id' => '6', 'role_id' => '1'),
            array('permission_id' => '7', 'role_id' => '1'),
            array('permission_id' => '8', 'role_id' => '1'),
            array('permission_id' => '9', 'role_id' => '1'),
            array('permission_id' => '10', 'role_id' => '1'),
            array('permission_id' => '11', 'role_id' => '1'),
            array('permission_id' => '12', 'role_id' => '1'),
            array('permission_id' => '13', 'role_id' => '1'),
            array('permission_id' => '14', 'role_id' => '1'),
            array('permission_id' => '15', 'role_id' => '1'),
            array('permission_id' => '16', 'role_id' => '1'),
            array('permission_id' => '17', 'role_id' => '1'),
            array('permission_id' => '18', 'role_id' => '1'),
        );
        DB::table('permission_role')->insert($permission_role);
    }
}
