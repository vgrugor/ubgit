<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_laptops', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id');
            $table->string('inventory', 12)->nullable();
            $table->string('sn', 15)->nullable();
            $table->integer('model_id');
            $table->string('name_pc', 25)->nullable();
            $table->integer('windows_id');
            $table->integer('office_id');
            $table->integer('responsible_person')->nullable();
            $table->text('history')->nullable();
            $table->integer('location_id');
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
        Schema::dropIfExists('pc_laptops');
    }
}
