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
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->id(); 
            $table->integer('parent')->default(0); 
            $table->integer('grand_parent')->default(0); 
            $table->longText('comment')->nullable();  
            $table->integer('user_id')->index(); 
            $table->integer('forum_id')->index(); 
            $table->integer('claps')->default(0); 
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
        Schema::dropIfExists('forum_comments');
    }
};
