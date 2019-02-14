<?php

use App\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'image_path'=>$faker->imageUrl($width=640, $height=480, 'cats', true, 'Faker') ,
    ];
});
