<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnoseSymptomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnose_symptom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diagnose_id')->constrained();
            $table->foreignId('symptom_id')->constrained();
            $table->float('value');
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
        Schema::dropIfExists('diagnose_symptom');
    }
}
