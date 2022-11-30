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
        Schema::table('movie_tag', function (Blueprint $table) {
            $table->dropForeign(['movie_id']);
            $table->dropForeign(['tag_id']);
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie_tags', function (Blueprint $table) {
            $table->dropForeign(['movie_id']);
            $table->dropForeign(['tag_id']);
        });
    }
};
