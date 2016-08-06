<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/////////Date Now()////////
		$now = date('Y-m-d H:i:s');
		///////////////////////////
		
		//////////Clean Tables/////////////
		DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
		///////////////////////////////////
		
		/////////////Roles/////////////////
		$client = new Role();
        $client->name = 'Client';
		$client->display_name='Client';
		$client->description='Client of service';
		$client->created_at = $now;
		$client->updated_at = $now;
        $client->save();
		
		$model = new Role();
        $model->name = 'Model';
		$model->display_name='Model';
		$model->description='Model';
		$model->created_at = $now;
		$model->updated_at = $now;
        $model->save();
		
		$admin = new Role();
        $admin->name = 'Admin';
		$admin->display_name='Admin';
		$admin->description='Administrator';
		$admin->created_at = $now;
		$admin->updated_at = $now;
        $admin->save();

        $manager = new Role();
        $manager->name = 'Manager';
		$manager->display_name='Manager';
		$manager->description='Manager';
		$manager->created_at = $now;
		$manager->updated_at = $now;
        $manager->save();
		/////////////End Roles////////////

		////////////Permissions///////////
		$permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
			        	[
        		'name' => 'user-list',
        		'display_name' => 'Display Users Listing',
        		'description' => 'See only Listing Of Users'
        	],
        	[
        		'name' => 'user-create',
        		'display_name' => 'Create User',
        		'description' => 'Create New User'
        	],
        	[
        		'name' => 'user-edit',
        		'display_name' => 'Edit User',
        		'description' => 'Edit Users'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Delete User',
        		'description' => 'Delete User'
        	]
        ];

        foreach ($permission as $key => $value) {
		
			$permission = new Permission();
			$permission->name = $value['name'];
			$permission->display_name = $value['display_name'];
			$permission->description = $value['description'];
			$permission->save();
			////////Attach permissions to admin role////////
			$admin->attachPermission($permission);
        }
		//////////////End permissions///////////////////////
		

		////////Add User "Admin"////////////////////////////
		
		$superadmin = new User();
		$superadmin->name = 'Admin';
		$superadmin->email= 'admin@admin.com';
		$superadmin->password = Hash::make('123456');
		$superadmin->created_at = $now;
		$superadmin->updated_at = $now;
        $superadmin->save();

		////////Attach admin role to admin//////////////////
        $superadmin->attachRole($admin);
		////////////////////////////////////////////////////
    }
}
