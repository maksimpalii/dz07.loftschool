<?php
require_once "config.php";

for ($i = 0; $i < 5; $i++) {
    $category = new \App\Category();
    $category->name = 'category-' . $i;
    $category->save();
}

for ($i = 0; $i < 20; $i++) {
    $faker = Faker\Factory::create();
    $book = new \App\Book();
    $book->name = $faker->name;
    $book->description = $faker->text;
    $book->category_id = $faker->numberBetween(1, 5);
    $book->save();
}
