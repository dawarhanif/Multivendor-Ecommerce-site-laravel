<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

                    [
                        'full_name'=>'Admin Dawar',
                        'username'=>'Admin',
                        'email'=>'admin@admin.com',
                        'password'=>HASH::make('abcd1234'),
                        'role'=>'admin',
                        'status'=>'active',
                    ],
                    [
                        'full_name'=>'Seller Dawar',
                        'username'=>'Seller',
                        'email'=>'vendor@admin.com',
                        'password'=>HASH::make('abcd1234'),
                        'role'=>'seller',
                        'status'=>'active',
                    ],
                    [
                        'full_name'=>'Customer Dawar',
                        'username'=>'Customer',
                        'email'=>'customer@admin.com',
                        'password'=>HASH::make('abcd1234'),
                        'role'=>'customer',
                        'status'=>'active',
                    ],
                    
                    


        ]);
    }
}
