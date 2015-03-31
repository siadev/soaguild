<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ApiMemberTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(20)->create('soaguild\ApiMember');
    }

}