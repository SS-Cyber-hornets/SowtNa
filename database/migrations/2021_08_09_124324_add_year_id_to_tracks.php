<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYearIdToTracks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->foreignId('year_id')->nullable()->constrained();
            $table->foreignId('group_id')->nullable()->constrained();
            $table->foreignId('label_id')->nullable()->constrained();
            $table->foreignId('album_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->dropForeign('year_id');
            $table->dropForeign('group_id');
            $table->dropForeign('label_id');
            $table->dropForeign('album_id');
            $table->dropForeign('category_id');
        });
    }
}
