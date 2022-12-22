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
        Schema::create('gardian', function (Blueprint $table) {
            $table->id('gradian_id');
            $table->string('student_id');
            $table->string('gardian');
            $table->string('GradianCNIC');
            $table->string('GardianGender');
            $table->string('GardianNumber');
            $table->string('GardianAddress');
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
        Schema::dropIfExists('gardian');
    }
};
