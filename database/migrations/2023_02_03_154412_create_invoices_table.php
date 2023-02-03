<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer("identified")->nullable();
            $table->integer("shopping_id")->nullable();
            $table->double('price', 10,2)->default(0.00);
            $table->double('import', 10,2)->default(0.00);
            $table->double('total', 10,2)->default(0.00);
            $table->integer("status_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->timestamps();

            $table->foreign('identified')->references('identified')->on('shoppings');
            $table->foreign('shopping_id')->references('id')->on('shoppings');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
