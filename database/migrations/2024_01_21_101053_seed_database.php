<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        // Utilisation de faker pour peupler la bdd
        $faker = Faker::create();

        // Création de catégories
        foreach (range(1, 10) as $index) {
            DB::table('categories')->insert([
                'name' => $faker->word,
                'slug' => $faker->slug,
                'color' => $faker->hexColor,
            ]);
        }

        // Création de tâches avec assignation à des catégories
        foreach (range(1, 30) as $index) {
            DB::table('tasks')->insert([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'description' => $faker->paragraph,
                'date' => $faker->dateTimeBetween('now', '+1 month'),
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
