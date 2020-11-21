<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInternetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internet_requests', function (Blueprint $table) {
            $table->boolean('is_completed')->after('date_request')->default(0);
            $table->text('note')->after('date_completion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internet_requests', function (Blueprint $table) {
            $table->dropColumn('is_completed');
            $table->dropColumn('note');
        });
    }
}
