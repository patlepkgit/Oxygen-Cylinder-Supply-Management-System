<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('adhar_id');
            $table->string('id_proof');
            $table->string('covid-19');
            $table->string('date_covid-19');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('phone');
            $table->string('cylinder_qty');
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
        Schema::dropIfExists('bookings');
    }
}
