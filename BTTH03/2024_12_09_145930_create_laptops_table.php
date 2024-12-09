<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('specifications');
            $table->boolean('rental_status');
            $table->unsignedBigInteger('renter_id')->nullable();
            $table->timestamps();

            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}