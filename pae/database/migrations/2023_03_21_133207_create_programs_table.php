<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {

            $table->integer('student_id');

            $table->string('course_id');


            $table->foreign('student_id')->references('id')->on('students')

                ->onDelete('cascade');

            $table->foreign('course_id')->references('id')->on('courses')

                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');

    }
};
