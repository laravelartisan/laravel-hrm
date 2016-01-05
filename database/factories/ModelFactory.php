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


$factory->define(\Erp\Models\Company\CompanyGroup::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,



    ];
});
$factory->define(\Erp\Models\Company\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'main_url' => $faker->url,
        'logical_url'=> $faker->url,
        'physical_url'=> $faker->url,
        'group_id'=> 1,
        'status'=> $faker->boolean(),
        'position'=> $faker->numberBetween(1,5),
        'is_default'=> $faker->boolean()


    ];
});
$factory->define(\Erp\Models\Department\Department::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'company_id' => 1,
        'status' => $faker->boolean(),
        'position' =>  $faker->numberBetween(1,5)
    ];
});
$factory->define(\Erp\Models\Religion\Religion::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => $faker->boolean()

    ];


});
$factory->define(\Erp\Models\Gender\Gender::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->boolean()

    ];
});
$factory->define(\Erp\Models\Gender\GenderTranslation::class, function (Faker\Generator $faker) {
    return [
        'gender_id' => 1,
        'name' => 'male',
        'locale'=> 'en'

    ];
});
/*$factory->define(Erp\Models\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/
