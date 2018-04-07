<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "config.php";
Capsule::schema()->dropIfExists('books');
Capsule::schema()->dropIfExists('category');


Capsule::schema()->create('category', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
});


Capsule::schema()->create('books', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
    $table->string('description'); //varchar 255
    $table->integer('category_id')->unsigned();
    // $table->timestamps(); //created_at&updated_at тип datetime
});
Capsule::schema()->table('books', function (Blueprint $table) {
    $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
});


