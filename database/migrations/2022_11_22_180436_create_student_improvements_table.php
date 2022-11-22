<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentImprovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_improvements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('from_class');
            $table->string('to_class');
            $table->string('from_year');
            $table->string('to_year');
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
        Schema::dropIfExists('student_improvements');
    }
}
