<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $user = User::where('email', 'abusalehkuakata@gmail.com')->first();

        if ( !$user){
            User::create([
                'name'      => 'Abu Saleh',
                'email'     => 'abusalehkuakata@gmail.com',
                'role'      => 'admin',
                'password'  => Hash::make('12345678')
            ]);
        }
    }
}
