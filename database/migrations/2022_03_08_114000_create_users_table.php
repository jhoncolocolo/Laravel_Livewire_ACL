<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return    void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment("User's name");
            $table->string('email',255)->nullable()->comment("User's Email");
            $table->timestamp('email_verified_at')->nullable()->comment("User's Timestamps");
            $table->string('password',255)->nullable()->comment("User's Password");
            $table->timestamps();
        
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return    void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};