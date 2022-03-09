<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB; 
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return    void
     */
    public function up()
    {
        Schema::create('auto_programming_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment("Programming_language's Table name");
            $table->mediumText('description')->nullable()->comment("Programming_language's Table description");
            $table->timestamps();
        
        });
         DB::statement("ALTER TABLE `auto_programming_languages` comment 'Table to Entered Diferents Programming languages'");
    }

    /**
     * Reverse the migrations.
     *
     * @return    void
     */
    public function down()
    {
        Schema::dropIfExists('auto_programming_languages');
    }
};