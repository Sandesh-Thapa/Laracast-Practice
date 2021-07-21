<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => User::factory(),
        'category_id' => Category::factory(),
        'title' => $this->faker->sentence,
        'slug' => $this->faker->slug,
        'excerpt' => $this->faker->sentence,
        'body' => $this->faker->paragraph,
    ];
});
