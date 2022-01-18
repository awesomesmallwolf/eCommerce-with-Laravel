<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name'=>'Superadmin'],
            ['role_name'=>'Admin'],
            ['role_name'=>'Inventory Manager'],
            ['role_name'=>'Order Manager'],
            ['role_name'=>'Customer'],
        ]);


        DB::table('users')->insert([
            'firstname'=>"Admin",
            'lastname'=>'Admin',
            'email'=>'super@gmail.com',
            'password'=>Hash::make('admin123'),
            'confirmpassword'=>Hash::make('admin123'),
            'status'=>True,
            'role_id'=>1,
        ]);
    }
}
