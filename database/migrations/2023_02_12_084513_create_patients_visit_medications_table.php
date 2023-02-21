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
        Schema::create('patients_visit_medications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_visit_id');
            $table->unsignedBigInteger('medicine_detail_id');
            $table->tinyInteger('quantity');
            $table->string('dosage',10);
            $table->foreign('patient_visit_id')->references('id')->on('patients_visit');
            $table->foreign('medicine_detail_id')->references('id')->on('medicines_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_visit_medications');
    }
};
