<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Api\Dressing;
use Faker\Generator as Faker;

$factory->define(Dressing::class, function (Faker $faker) {
    return [
        'gender'=>mt_rand(0,50),
        'hairStyle'=>mt_rand(0,50),
        'hairColor'=>mt_rand(1,50),
        'eyeStyle'=>mt_rand(1,50),
        'skinStyle'=>mt_rand(1,50),
        'glassesStyle'=>mt_rand(1,50),
        'glassesColor'=>mt_rand(1,50),
        'chestStyle'=>mt_rand(1,50),
        'chestColor'=>mt_rand(1,50),
        'legStyle'=>mt_rand(1,50),
        'legColor'=>mt_rand(1,50),
        'feetStyle'=>mt_rand(1,50),
        'feetColor'=>mt_rand(1,50),
        'user_id'=>mt_rand(1,30)

    ];
});
