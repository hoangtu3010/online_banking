<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("customer_image")->nullable();
            $table->string("user_email");
            $table->string("content");
            $table->unsignedBigInteger("reply_id")->nullable();
            $table->unsignedBigInteger("new_id");
            $table->timestamps();
            $table->foreign("new_id")->references("id")->on("news");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
