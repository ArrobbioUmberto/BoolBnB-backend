<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Messages', function (Blueprint $table) {

            $table->unsignedBigInteger('apartment_id')->nullable()->after('id');

            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Messages', function (Blueprint $table) {

            $table->dropForeign(['apartment_id']);

            $table->dropColumn('apartment_id');
        });
    }
};
