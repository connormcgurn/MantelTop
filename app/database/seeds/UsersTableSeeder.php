<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->delete();

        $users = array(
            array(
                'username'   => 'user',
                'email'      => 'user@example.org',
                'password'   => Hash::make('password'),
                'firstName' => 'John',
                'updated_at' => 'Smith'
            )
        );

        DB::table('users')->insert( $users );
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}