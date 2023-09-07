<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('sur_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('alternative_modile')->nullable();
            $table->string('gender');
            $table->date('d_o_b');
            $table->boolean('id_type')->nullable()->default(1)->comment('passport=1, idcard=0');
            $table->string('id_number')->comment('id card number or passport number');
            $table->string('nationality')->nullable();
            $table->boolean('visa_holder')->nullable()->default(1)->comment('yes=1, no=0');
            $table->mediumText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('state')->nullable()->comment('AKA province');
            $table->string('country');
            $table->boolean('travel_history')->nullable()->default(1)->comment('yes=1, not yet=0');
            $table->string('traveled_to')->nullable();
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
        Schema::dropIfExists('student_info');
    }
}
