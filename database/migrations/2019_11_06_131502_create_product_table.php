<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('type');
            $table->string('title');
            $table->string('slug');
            $table->string('cover');
            $table->string('list_img', 1000);
            $table->string('description', 1000);
            $table->text('content');
            $table->string('unit');
            $table->string('weight');
            $table->string('origin');
            $table->unsignedSmallInteger('status');
            $table->unsignedInteger('pos');
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
        Schema::dropIfExists('product');
    }
}
