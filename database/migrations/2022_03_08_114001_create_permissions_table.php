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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment("Table Permision's Name");
            $table->string('route',255)->nullable()->comment("Table Permision's Route name, expecific the route in the app");
            $table->mediumText('description')->comment("Table Permision's Describe Route of app");
            $table->timestamps();
        
        });
         DB::statement("ALTER TABLE `permissions` comment 'Table&quot;s Permissions'");
    }

    /**
     * Reverse the migrations.
     *
     * @return    void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};