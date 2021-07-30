<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("content")->nullable();
            $table->decimal("money", 16, 2);
            $table->string("sender");
            $table->string("getter");
            $table->unsignedBigInteger("bank_account_id");
            $table->timestamps();
            $table->foreign("bank_account_id")->references("id")->on("bank_account");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
