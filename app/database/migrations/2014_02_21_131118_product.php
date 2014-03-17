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
            $table->decimal('price', 6, 2);
            $table->integer('brand_id')->references('id')->on('brands');
            $table->integer('category_id')->references('id')->on('categories');
            $table->boolean('availability')->default(true);
            $table->string('product_pic');
            $table->timestamps();
        });

        // Creates the attributes table
        Schema::create('attributes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->integer('attribute_type_id')->references('id')->on('attribute_types');
            $table->integer('product_id')->references('id')->on('products');
            $table->timestamps();
        });

        // Creates the attribute_types table
        Schema::create('attribute_types', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

         // Creates the attribute_list table
        Schema::create('attribute_lists', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
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
            $table->dropForeign('attributes_product_id_foreign');

        });

		Schema::drop('products');
        Schema::drop('brands');
        Schema::drop('categories');
        Schema::drop('attributes');
        Schema::drop('attribute_types');
        Schema::drop('attribute_links');
	}

}
