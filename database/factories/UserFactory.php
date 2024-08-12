<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Category;
use App\Product;
use App\Transaction;
use App\Seller;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // password
        'remember_token' => Str::random(10),
        'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
    ];
});


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(Transaction::class, function (Faker $faker) {
    $seller = Seller::has('products')->get();
    $buyer = User::all();
    return [
        'quantity' => $faker->numberBetween(1, 3),
        'buyer_id' => $buyer->random()->id,
        'buyer_id' => $buyer->id,
        'product_id' => $seller->products->id,
    ];
});
