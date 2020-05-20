<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'category_id' => $faker->numberBetween(1,4),
        'user_id' => $faker->numberBetween(1,5)
    ];
});
