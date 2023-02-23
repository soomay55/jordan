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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('membership_id')->nullable();
            $table->enum('is_parent',[1,0])->nullable();
            $table->bigInteger('code')->nullable();
            $table->date('expire')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
