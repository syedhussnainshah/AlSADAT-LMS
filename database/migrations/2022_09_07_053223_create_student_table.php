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
        Schema::create('student', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('StudentBform');
            $table->string('StudentName');
            $table->string('StudentEmail');
            $table->string('StudentWhatsappNumber');
            $table->string('StudentClass');
            $table->string('StudentDOB');
            $table->string('StudentAge');
            $table->string('StudentCampus');
            $table->string('StudentGender');
            $table->string('StudentCast');
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
        Schema::dropIfExists('student');
    }
};
