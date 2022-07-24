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
        Schema::create('articals_comments', function (Blueprint $table) {
            $table->id();
            $table->longText('comment');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('artical_id')->references('id')->on('articals')->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('articals_comments');
    }
};
