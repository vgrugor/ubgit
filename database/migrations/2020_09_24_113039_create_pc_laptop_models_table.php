<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcLaptopModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_laptop_models', function (Blueprint $table) {
            $table->id();
            $table->integer('manufacturer_id');
            $table->string('name', 30);
            $table->string('name_accountings')->nullable();
            $table->boolean('is_laptop');
            $table->string('processor', 30)->nullable();
            $table->integer('ram')->nullable();
            $table->integer('ssd_hdd')->nullable()              ;
            $table->float('diagonal', 4, 2)->nullable();
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
        Schema::dropIfExists('pc_laptop_models');
    }
}
