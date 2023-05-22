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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->tinyInteger("rooms");
            $table->tinyInteger("beds");
            $table->tinyInteger("bathrooms");
            $table->smallInteger("sqm");
            $table->string("address");
            $table->string("city");
            $table->float("lat", 8, 5)->nullable();
            $table->float("lng", 8, 5)->nullable();
            $table->tinyInteger("visibility")->default(1);
            $table->decimal("price", 6, 2);
            $table->text("description");
            $table->string("cover_image");
            $table->string('slug');
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
        Schema::dropIfExists('apartments');
    }
};
