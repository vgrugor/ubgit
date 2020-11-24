<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInternetRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('point_id')->constrained();
            $table->foreignId('internet_provider_id')->constrained();
            $table->foreignId('internet_request_type_id')->constrained();
            $table->date('date_send')->nullable();
            $table->date('date_request')->nullable();
            $table->date('date_completion')->nullable();
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
        Schema::dropIfExists('internet_requests');
    }
}
