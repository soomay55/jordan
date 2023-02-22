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
        Schema::create('membership_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('membership_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            
            $table->unique(['membership_id','locale']);
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_translations');
    }
};
