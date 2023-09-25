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
            $table->string('name');
            $table->foreignId('uni_id')->constrained('universities')->cascadeOnDelete();
            $table->string('country_id');
            $table->string('city_id');
            $table->string('duration')->nullable();
            $table->string('image_name')->nullable();
            $table->string('folder_name')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('degree_id')->nullable();
            $table->float('tuition_fee', 10, 2)->nullable()->comment('year=1,semster=2, month=3')->default(123.45);
            $table->string('tuition_fee_type')->nullable();
            $table->integer('study_model_id')->nullable();
            $table->longText('description')->nullable()->default('text');
            $table->string('language')->nullable()->default('English');
            $table->integer('discipline_id')->nullable();
            $table->string('season')->nullable();
            $table->string('start_month')->nullable();
            $table->longText('requirement_details')->nullable()->default('text');
            $table->longText('other_requirements')->nullable()->default('text');
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
