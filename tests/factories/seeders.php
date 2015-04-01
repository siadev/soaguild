<?php
$realms = ['Dreadmaul', 'Thaurissan'];

$factory('soaguild\User', [
    'main_toon' => $faker->unique()->firstName,
    'is_admin' => 0,
    'role' => 'member',
    'email' => $faker->unique()->email,
    'realm' => $faker->randomElement($realms),
    'password' => bcrypt('password')
]);

// And a custom one for administrators

$factory('soaguild\User', 'admin_user', [
    'main_toon' => $faker->unique()->firstName,
    'is_admin' => 1,
    'role' => 'admin',
    'email' => $faker->unique()->email,
    'realm' => $faker->randomElement($realms),
    'password' => bcrypt('password')
]);


$factory('soaguild\ApiMember', [
    'user_id'                  => 'factory:soaguild\User',
    'main_toon'                => $faker->firstName,
    'toon_realm'               => $faker->words('Dreadmaul', 'Thaurissan'),
    'toon_level'               => $faker->numberBetween(1,100),
    'toon_class'               => $faker->numberBetween(1,10),
    'toon_gender'              => $faker->numberBetween(1,2),
    'toon_achievementPoints'   => $faker->numberBetween(1,10000),
    'toon_thumbnail'           => 'http://lorempixel.com/32/32/'
]);

