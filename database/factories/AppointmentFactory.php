<?php

use App\Models\Patient;
use App\Models\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'patient_id' => factory(Patient::class)->lazy(),
        'type' => $faker->randomElement(['scheduled', 'walk-in']),
        'appointment_date' => $faker->dateTime(),
        'next_appointment_date' => $faker->dateTime(),
    ];
});
