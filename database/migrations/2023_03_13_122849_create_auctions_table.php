<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title')->unique();

            $table->text('description')->nullable();

            $table->integer('quantity');

            $table->unsignedBigInteger('activation_id');
            $table->foreign('activation_id')->references('id')->on('activations')->onDelete('cascade');

            $table->unsignedBigInteger('capacity_id');
            $table->foreign('capacity_id')->references('id')->on('capacities')->onDelete('cascade');

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('device_type_id');
            $table->foreign('device_type_id')->references('id')->on('device_types')->onDelete('cascade');

            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');

            $table->unsignedBigInteger('manufacture_id');
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('sim_id');
            $table->foreign('sim_id')->references('id')->on('sims')->onDelete('cascade');

            $table->unsignedBigInteger('extension_id');
            $table->foreign('extension_id')->references('id')->on('extensions')->onDelete('cascade');

            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');

            $table->dateTime('closing_date');

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
        Schema::dropIfExists('auctions');
    }
}
