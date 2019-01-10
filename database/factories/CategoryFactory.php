<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    $dateTime = $faker->date() . '' . $faker->time();
    return [
        'name'=>'',
        'created_at' => $dateTime,
        'updated_at' => $dateTime,
        //
    ];
});
