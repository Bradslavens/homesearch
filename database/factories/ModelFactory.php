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
        'L_ListingID' => $faker->randomNumber(7),
        'FullAddress' => $faker->randomNumber() . " " . $faker->word() . " " . $faker->word . ", " . $faker->word() . ", " . $faker->word . "  92109",
        'L_AskingPrice' => $faker->randomNumber(6),
        'L_AddressNumber' => $faker->randomNumber(4),
        'L_AddressDirection' => $faker->word(),
        'L_AddressStreet' => $faker->word(),
        'L_Address2' => $faker->word(),
        'L_City' => $faker->word(),
        'L_State' => $faker->word(),
        'L_Zip' => $faker->randomNumber(5),
        'LM_Int1_3' => $faker->randomNumber(1),
        'LM_Int2_3' => $faker->randomNumber(1),
        'LM_Int1_5' => $faker->randomNumber(1),
        'LM_Int4_1' => $faker->randomNumber(1),
        'L_UpdateDate' => $faker->date(),
        'L_ListingDate' => $faker->date(),
        'LM_Char10_1' => 'SanDiego',
        'L_Status' => 'ACTIVE',
        'L_StatusCatID' => 'Active',
        'LFD_Terms_42' => $faker->word(),
        'LR_remarks11' => $faker->sentence(),
        'LM_Char10_6' => $faker->word(),
        'LM_Char10_11' => $faker->word(),
        'LM_Char10_15' => $faker->word(),
        'LM_Char50_5' => $faker->word(),
        'LM_Int1_8' => $faker->word(),
        'LM_Int2_1' => $faker->word(),
        'LM_Int4_7' => $faker->word(),
        'LM_Int4_8' => $faker->word(),
        'LM_Int4_16' => $faker->word(),
        'LM_Dec_3' => $faker->word(),
        'LM_Dec_4' => $faker->word(),
        'LM_Dec_6' => $faker->word(),
        'LFD_Cooling_3' => $faker->word(),
        'LFD_Equipment_4' => $faker->word(),
        'LFD_LaundryLocation_15' => $faker->word(),
        'LFD_Pool_25' => $faker->word(),
        'LFD_SchoolDistrict_32' => $faker->word(),
        'LFD_View_44' => $faker->word(),
        'LFD_PropertyCondition_305' => $faker->word(),
        'LM_Int2_6' => $faker->randomNumber(1),
        'L_IdxInclude' => $faker->numberBetween(0,2),
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