<?php
use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration {

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
            $table->string('name');
            $table->string('type');
            $table->integer('product_id')->references('id')->on('products');
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

        // Creates the users table
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(false);
            $table->boolean('isadmin')->default(0);
            $table->boolean('issp')->default(0);
            $table->boolean('banned')->default(0);
            $table->timestamps();
        });
         Schema::create('sales',function($table)
        {
            $table->increments('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('sp_code')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobilephonenumber');
            $table->text('address');
            $table->boolean('banned')->default(false);
            $table->unsignedInteger('sp_code')->default(0);
            $table->unsignedInteger('resp_sp_code')->default(0);
            $table->decimal('point',7,2);
            $table->timestamps();
        });
        Schema::create('orders',function($table)
        {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->timestamps('update_at');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
         Schema::create('confirmations',function($table)
        {
            $table->increments('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('confirmed')->default(0);
            $table->string('image.path'); 
        });
         Schema::create('order_lists',function($table)
        {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('amount')->default(0);
            $table->decimal('total_cost', 8, 2);; 
        });

        // Creates password reminders table
        Schema::create('password_reminders', function($t)
        {
            $t->string('email');
            $t->string('token');
            $t->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
        Schema::drop('sales');
        Schema::drop('orders');
        Schema::drop('order_lists');
        Schema::drop('confirmations');
        Schema::drop('customers');
    }

}
