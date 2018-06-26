<?php

namespace App\Controllers;

use Illuminate\Database\Schema\Blueprint;
use App\Core\Connection;

class Migration
{
    public function start()
    {
        $capsule = Connection::getInstance();

        //brands table
        $capsule::schema()->dropIfExists('brands');
        $capsule::schema()->create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //varchar 255
        });

        //categories
        $capsule::schema()->dropIfExists('categories');
        $capsule::schema()->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //varchar 255
            $table->integer('parent_id')->unsigned()->nullable();
        });

        //images
        $capsule::schema()->dropIfExists('images');
        $capsule::schema()->create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('url');
            $table->boolean('main_image');
        });

        //products
        $capsule::schema()->dropIfExists('products');
        $capsule::schema()->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('article');
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->unsigned();
            $table->string('name');
            $table->text('description');
        });
    }
}
