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
        Schema::create('apartment_service', function (Blueprint $table) {

            $table->unsignedBigInteger("apartment_id");
            $table->foreign("apartment_id")->references("id")->on("apartments")->onDelete("CASCADE")->onUpdate("CASCADE");

            $table->unsignedBigInteger("service_id");
            $table->foreign("service_id")->references("id")->on("services")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_service');
    }
};
