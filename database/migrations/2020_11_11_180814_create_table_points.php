<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('drill_id')->constrained();
            $table->integer('nld')->default(NULL)->nullable();
            $table->integer('nlm')->default(NULL)->nullable();
            $table->float('nls', 8, 2)->default(NULL)->nullable();
            $table->integer('eld')->default(NULL)->nullable();
            $table->integer('elm')->default(NULL)->nullable();
            $table->float('els', 8, 2)->default(NULL)->nullable();
            $table->boolean('coordinate_stage')->default(0);
            $table->string('address', 256)->nullable();
            $table->date('date_building')->default(NULL)->nullable();
            $table->date('date_drilling')->default(NULL)->nullable();
            $table->date('date_demount')->default(NULL)->nullable();
            $table->date('date_transfer')->default(NULL)->nullable();
            $table->date('date_refresh')->default(NULL)->nullable();
            $table->foreignId('actual_stage_id')->constrained();
            $table->date('date_actual_stage_refresh')->default(NULL)->nullable();
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
        Schema::dropIfExists('points');
    }
}
