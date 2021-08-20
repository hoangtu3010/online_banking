<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSavaMoney extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaveMoney', function (Blueprint $table) {
            //  $table->string('code');
            $table->id();
            $table->string('stk');
            $table->string('money');
            $table->string('timeSave');
            $table->unsignedBigInteger('bankAcc_id');
            $table->timestamps();
            $table->foreign("bankAcc_id")->references("id")->on("bank_account");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SaveMoney');
    }
}
