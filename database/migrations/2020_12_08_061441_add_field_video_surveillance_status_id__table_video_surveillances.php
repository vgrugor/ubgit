<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldVideoSurveillanceStatusIdTableVideoSurveillances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_surveillances', function (Blueprint $table) {
            $table->foreignId('video_surveillance_status_id')->after('point_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_surveillances', function (Blueprint $table) {
            Schema::dropIfExists('video_surveillance_status_id');
        });
    }
}
