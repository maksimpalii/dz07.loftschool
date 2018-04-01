<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "config.php";


Capsule::schema()->dropIfExists('books');
Capsule::schema()->dropIfExists('category');


Capsule::schema()->create('books', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
    $table->string('description'); //varchar 255
    $table->integer('category_id')->default(1);
   // $table->timestamps(); //created_at&updated_at тип datetime
});

Capsule::schema()->create('category', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
});

