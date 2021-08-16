<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Api\Catalogue;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Api\Catalogue::class, function (Faker $faker) {
    return [
        'ranking' => mt_rand(1,10),
        'win'=>mt_rand(1,12000),
        'lose'=>mt_rand(1,10000),
        'user_id'=>mt_rand(1,1000)
    ];
});
