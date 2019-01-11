<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    $dateTime = $faker->date() . '' . $faker->time();
    return [
        // 'name' => $faker->name,
        'content' => $faker->text,
        'created_at' => $dateTime,
        'updated_at' => $dateTime,
        'user_id' => random_int(1, 10),
        'topic_id' => random_int(1, 100),
    ];
});
