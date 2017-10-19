<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectionColorsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('bg_sections')->default('teal');
            $table->string('fg_sections')->nullable();
            $table->string('bg_color')->default('white');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('bg_sections');
            $table->dropColumn('fg_sections');
            $table->dropColumn('bg_color');
        });
    }
}
