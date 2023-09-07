<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('student_tests')->cascadeOnDelete();
            $table->string('type')->nullable()->comment('ielts, pte, toefl, moi');
            $table->string('image_name')->nullable();
            $table->string('folder_name')->nullable();
            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('test_gallery');
    }
}
