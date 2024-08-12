<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $cantidausuarios = 200;
        $cantdiadCategorias = 30;
        $cantidaProductos = 1000;
        $cantidaTransacciones = 1000;

        factory(User::class, $cantidausuarios)->create();
        factory(Category::class, $cantdiadCategorias)->create();
        
        factory(Transaction::class, $cantidaTransacciones)->create();
    }
}
