<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drills', function (Blueprint $table) {
            $table->id();
            $table->string('number', 5)->nullable();
            $table->integer('drill_type_id');
            $table->string('name', 50);
            $table->integer('nld')->nullable();
            $table->integer('nlm')->nullable();
            $table->float('nls', 8, 2)->nullable();
            $table->integer('eld')->nullable();
            $table->integer('elm')->nullable();
            $table->float('els', 8, 2)->nullable();
            $table->integer('coordinate_stage');
            $table->string('address', 256)->nullable();
            $table->string('phone_number', 14)->nullable();
            $table->date('date_building')->nullable();
            $table->date('date_drilling')->nullable();
            $table->date('date_demount')->nullable();
            $table->date('date_transfer')->nullable();
            $table->date('date_refresh')->nullable();
            $table->integer('actual_stage_id');
            $table->date('date_actual_stage_refresh')->nullable();
            $table->string('email', 256)->nullable();
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
        Schema::dropIfExists('drills');
    }
}
