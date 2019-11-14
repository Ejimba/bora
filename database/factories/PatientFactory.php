<?php

use App\Models\Patient;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->lazy(),
    ];
});
