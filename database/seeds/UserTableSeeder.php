<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use soaguild\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'main_toon' => 'Borca',
            'is_admin' => '1',
            'role' => 'admin',
            'email' => 'borca@soaguild.com',
            'realm' => 'Dreadmaul',
            'password' => bcrypt('password')
        ]);

        TestDummy::times(20)->create('soaguild\User');
        TestDummy::times(5)->create('admin_user');
    }

}