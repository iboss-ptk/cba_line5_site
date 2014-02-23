<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the products table
        Schema::create('products', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('brand_id')->references('id')->on('brands');
            $table->integer('category_id')->references('id')->on('categories');
            $table->boolean('availability')->default(true);
            $table->integer('product_pic_id')->references('id')->on('product_pics');
            $table->timestamps();
        });

        // Creates the attributes table
        Schema::create('attributes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->integer('attribute_type_id')->references('id')->on('attribute_types');
            $table->timestamps();
        });

        // Creates the attribute_types table
        Schema::create('attribute_types', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

         // Creates the attribute_links table
        Schema::create('attribute_links', function($table)
        {
            $table->integer('product_id')->references('id')->on('products');
            $table->integer('attribute_id')->references('id')->on('attributes');
        });

        // Creates the product_pics table
        Schema::create('product_pics', function($table)
        {
            $table->increments('id')->unsigned();
            $table->boolean('use_url')->default(true);
            $table->string('url')->nullable();
            $table->timestamps();
        });

        // Creates the brands table
        Schema::create('brands', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        // Creates the categories table
        Schema::create('categories', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_brand_id_foreign');
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_product_pic_id_foreign');
        });

        Schema::table('attributes', function(Blueprint $table) {
            $table->dropForeign('attributes_attribute_type_id_foreign');

        });

        Schema::table('attribute_links', function(Blueprint $table) {
            $table->dropForeign('attribute_links_product_id_foreign');
            $table->dropForeign('attribute_links_attribute_id_foreign');
        });

		Schema::drop('products');
        Schema::drop('product_pics');
        Schema::drop('brands');
        Schema::drop('categories');
        Schema::drop('attributes');
        Schema::drop('attribute_types');
        Schema::drop('attribute_links');
	}

}
