<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->integer('drill_id');
            $table->integer('position_id')->nullable();
            $table->string('name', 100);
            $table->string('account_ad', 50)->nullable();
            $table->string('phone_number', 14)->nullable();
            $table->string('phone_number2', 14)->nullable();
            $table->string('email', 256)->nullable();
            $table->integer('vpn_status_id');
            $table->date('date_refresh')->nullable();
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
        Schema::dropIfExists('workers');
    }
}
