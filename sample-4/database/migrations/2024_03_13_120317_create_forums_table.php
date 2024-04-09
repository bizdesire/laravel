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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index(); 
            $table->integer('forum_category_id')->index(); 
            $table->longText('description')->nullable();
            $table->string('image')->nullable(); 
            $table->integer('status')->default(0);
            $table->integer('view')->default(0);
            $table->integer('claps')->default(0);
            $table->integer('user_id')->index(); 
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
        Schema::dropIfExists('forums');
    }
};
