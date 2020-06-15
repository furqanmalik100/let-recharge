<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
            $table->bigInteger('user_id');
            $table->string('recipient');
            $table->string('product');
            $table->string('operator');
            $table->string('country');
            $table->string('external_id')->nullable();
            $table->string('charge_id');
            $table->integer('product_id');
            $table->integer('operator_id');
            $table->integer('country_id');
            $table->float('amount');
            $table->tinyInteger('type')->comment = "1: Goods & Services, 2: AitTime";
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
        Schema::dropIfExists('transactions');
    }
}
