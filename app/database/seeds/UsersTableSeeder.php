<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersTableSeed
 *
 * @author permana
 */
class UsersTableSeeder extends Seeder{
    
    public function run()
	{
            User::truncate();
            for( $i = 1; $i <= 10; $i++)
            {
                User::create([
                   'username' => 'guest'.$i,
                    'email' => 'guest'.$i.'@gmail.com',
                    'fullname' => 'Nama guest'.$i,
                    'password' => Hash::make('pass'.$i)
                ]);
            }
	}
    //put your code here
}
