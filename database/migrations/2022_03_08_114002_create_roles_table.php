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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment("Table Permision's Name");
            $table->string('role',255)->nullable()->comment("Table Role's  Role name, expecific the role in the app");
            $table->mediumText('description')->comment("Table Permision's Describe Route of app");
            $table->timestamps();
        
        });
         DB::statement("ALTER TABLE `roles` comment 'Roles for Allow Access in the Any System'");
    }

    /**
     * Reverse the migrations.
     *
     * @return    void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};