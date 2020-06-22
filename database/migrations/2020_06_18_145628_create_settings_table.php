<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_public_key')->nullable();
            $table->string('stripe_secret_key')->nullable();
            $table->string('services_api_public_key')->nullable();
            $table->string('services_api_secret_key')->nullable();
            $table->string('airtime_api_login')->nullable();
            $table->string('airtime_api_token')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
