<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uni_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uni_id')->constrained('university_info')->cascadeOnDelete();
            $table->string('country_id');
            $table->string('city_id');
            $table->integer('duration_id')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('degree_id')->nullable();
            $table->float('tuition_fee', 10, 2)->nullable()->default(123.45);
            $table->integer('tuition_fee_type_id')->nullable();
            $table->integer('study_model_id')->nullable();
            $table->longText('description')->nullable()->default('text');
            $table->string('language')->nullable()->default('English');
            $table->integer('discipline_id')->nullable();
            $table->string('fall_month')->nullable();
            $table->string('spring_month')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uni_courses');
    }
}
