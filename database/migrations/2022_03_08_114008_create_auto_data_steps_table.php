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
        Schema::create('auto_data_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment("Step's Table database_id");
            $table->unsignedBigInteger('auto_programming_language_id')->comment("Auto Programming Languages Table Id ");
            $table->string('name',255)->comment("Step's Table name");
            $table->mediumText('description')->nullable()->comment("Step's Table description");
            $table->timestamps();
    
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
    
            $table->foreign('auto_programming_language_id')
                ->references('id')
                ->on('auto_programming_languages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        
        });
         DB::statement("ALTER TABLE `auto_data_steps` comment 'Steps Table this table is used to entered all steps para download  one project'");
    }

    /**
     * Reverse the migrations.
     *
     * @return    void
     */
    public function down()
    {
        Schema::dropIfExists('auto_data_steps');
    }
};