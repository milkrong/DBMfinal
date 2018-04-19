<?php

use Faker\Generator as Faker;

$factory->define(App\OrderItem::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween($min=205,$max=254),
        'product_id' => $faker->numberBetween($min=1,$max=34),
        'amount' => $faker->numberBetween($min=1,$max=10),
    ];
});
