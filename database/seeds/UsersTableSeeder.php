<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        $roles = factory("App\Role")->create([
        	'name'=>"administrator",
        	"description"=>"administrator"
        ]);

        factory("App\Role")->create([
        	'name'=>"contractor",
        	"description"=>"Contractor Role"
        ]);

        factory("App\Role")->create([
        	'name'=>"rep",
        	"description"=>"Rep Role"
        ]);

        $user = factory("App\User")->create([
        	'username'=>'reggie',
        	"device_id"=>"",
        	'status'=>'verified',
	        'email'=>"reggie@twmg.com.au",
	        "password"=>bcrypt("twmg#2019")		        
	    ]);
		
		$roles->first()->users()->sync($user)
;    }
}
