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
        Schema::create('user_reactions', function (Blueprint $table) {
            $table->id();
            $table->integer('relation_id')->index(); 
            $table->integer('user_id')->default(0);
            $table->string('type')->default('view');
            $table->string('relation_type')->default('forum');
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
        Schema::dropIfExists('user_reactions');
    }
};