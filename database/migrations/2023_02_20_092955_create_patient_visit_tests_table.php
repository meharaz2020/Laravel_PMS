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
        Schema::create('patient_visit_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_visit_id');
            $table->unsignedBigInteger('lab_test');
            $table->foreign('patient_visit_id')->references('id')->on('patients_visit');
            $table->foreign('lab_test')->references('id')->on('lab_test');
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
        Schema::dropIfExists('patient_visit_tests');
    }
};
