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
        Schema::create('patients_visit_diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_visit_id');
            $table->unsignedBigInteger('disease_id');
            $table->foreign('patient_visit_id')->references('id')->on('patients_visit');
            $table->foreign('disease_id')->references('id')->on('disease');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients_visit_diseases');
    }
};
