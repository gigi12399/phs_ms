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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nrc')->unique();
            $table->string('email')->unique();
            $table->boolean('gender');
            $table->string('phone');
            $table->date('birthday');
            $table->text('address');
            $table->string('profile');
            // $table->unsignedBigInteger('section_id');
            // $table->foreign('section_id')->references('id')->on('sections');
            // $table->unsignedBigInteger('academic_year_id');
            // $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->text('info')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
