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
        Schema::create('support_categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('label')->nullable();
            $table->string('image')->nullable(); 
            $table->text('description')->nullable(); 
            $table->text('reasons')->nullable(); 
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('support_categories');
    }
};