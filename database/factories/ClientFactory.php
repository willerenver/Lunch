<?php

use App\Models\Client;

$factory->define(App\Model\Client::class, function (Faker\Generator $faker) {
    return [
        'FirstName' => $faker->word,
        'LastName' => $faker->name,
        'Email' => $faker->unique()->safeEmail,
        'Age' =>$faker->numberBetween(18,50),
        'Address' => $faker->paragraph(1),
        'IsFood' =>0,
        'Observation' =>$faker->paragraph(2),
    ];
});
?>