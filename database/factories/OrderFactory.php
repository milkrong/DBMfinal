<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'order_date' => $faker->dateTimeBetween($startDate='2010-01-01',$endDate='now'),
        'store_id' => $faker->numberBetween($min=10,$max=100),
        'note' => $faker->text,
        'user_id' => $faker->numberBetween($min=1,$max=3),
        'pay_method' => $faker->randomElement(['cash','paypal']),
        'zip' => $faker->randomElement(['19006','17507','15241']),
    ];
});
