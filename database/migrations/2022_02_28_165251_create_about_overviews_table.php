<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_overviews', function (Blueprint $table) {
            $table->id();
            $table->longText('history')->nullable();
            $table->longText('motto')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('objectives')->nullable();
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
        Schema::dropIfExists('about_overviews');
    }
}
