<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_footers', function (Blueprint $table) {
            $table->id();
            $table->string('location_line1')->nullable();
            $table->string('location_line2')->nullable();
            $table->time('hours_time_from')->nullable();
            $table->time('hours_time_to')->nullable();
            $table->string('hours_day_from')->nullable();
            $table->string('hours_day_to')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('copyright_text')->nullable();
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
        Schema::dropIfExists('setting_footers');
    }
}
