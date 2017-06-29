<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Property::class, function (Faker\Generator $faker)
{
    return [
        'L_ListingID' => $faker->randomNumber(),
        'FullAddress' => $faker->randomNumber() . " " . $faker->word() . " " . $faker->word . ", " . $faker->word() . ", " . $faker->word . "  " . $faker->randomNumber(),
        'L_AskingPrice' => $faker->randomNumber(),
        'L_AddressNumber' => $faker->randomNumber(),
        'L_AddressDirection' => $faker->word(),
        'L_AddressStreet' => $faker->word(),
        'L_Address2' => $faker->word(),
        'L_City' => $faker->word(),
        'L_State' => $faker->word(),
        'L_Zip' => $faker->randomNumber(),
        'LM_Int1_3' => $faker->randomNumber(),
        'LM_Int2_3' => $faker->randomNumber(),
        'LM_Int1_5' => $faker->randomNumber(),
        'LM_Int4_1' => $faker->randomNumber(),
        'L_UpdateDate' => $faker->date(),
        'L_ListingDate' => $faker->date(),
        'LM_Char10_1' => 'SanDiego',
        'L_Status' => 'ACTIVE',
        'L_StatusCatID' => 1,
    ];

});


$factory->define(App\Image::class, function (Faker\Generator $faker)
{
    return [
        'link' => "http://placehold.it/800x800",
    ];

});


$factory->define(App\Applicant::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'licenseNumber' => $faker->randomNumber,
        'phone' => $faker->phone,
        'email' => $faker->email,
        'position' => $faker->word,
    ];

});