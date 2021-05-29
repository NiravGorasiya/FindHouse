<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('rooms');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('area_size');
            $table->string('size_prefix');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('garages');
            $table->string('year_built');
            $table->string('amenities');
            $table->string('image');
            $table->string('p_description');
            $table->string('p_bedrooms');
            $table->string('p_bathrooms');
            $table->string('p_postfix');
            $table->string('p_price');
            $table->string('p_size');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('properties');
    }
}
