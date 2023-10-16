<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
            $table->string('intake')->nullable();
            $table->string('location')->nullable();
            $table->integer('study_model')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('occupation')->nullable();
            $table->boolean('visa')->default(false);
            $table->longText('notes')->nullable();
            $table->string('image_url');
            $table->string('image_folder');
            $table->string('image_name');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('uni_courses')->cascadeOnDelete();
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
        Schema::dropIfExists('student_applications');
    }
}
