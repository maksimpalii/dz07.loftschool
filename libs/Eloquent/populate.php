<?php
require_once "config.php";

for ($i = 0; $i < 30; $i++) {
    $faker = Faker\Factory::create();
    $book = new Book();
    $book->name = $faker->name;
    $book->description = $faker->text;
    $book->category_id = $faker->numberBetween(1, 5);
    $book->save();
}
