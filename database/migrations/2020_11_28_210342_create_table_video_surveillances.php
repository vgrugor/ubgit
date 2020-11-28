<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVideoSurveillances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_surveillances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('point_id')->constrained();
            $table->date('date_installation')->default(NULL)->nullable();
            $table->date('date_demount')->default(NULL)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('video_surveillances');
    }
}
