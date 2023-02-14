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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->integer('user_id')->nullable();
            $table->integer('campaign_by')->nullable();
            $table->float('amount');
            $table->enum('anonymous',['yes','no'])->default('no');
            $table->string('donator_name')->nullable();
            $table->string('donator_email')->nullable();
            $table->string('donator_phone')->nullable();
            $table->string('donator_address')->nullable();
            $table->string('donator_city')->nullable();
            $table->string('donator_zip')->nullable();
            $table->string('donation_method')->nullable();
            $table->string('txn_id')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('donate_date')->nullable();
            $table->enum("status",['pending','paid','fail'])->default('pending');
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
        Schema::dropIfExists('donations');
    }
};
