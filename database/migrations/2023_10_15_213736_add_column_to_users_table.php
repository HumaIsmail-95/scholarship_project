<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('personal')->default(false)->after('profile_percentage');
            $table->boolean('education')->default(false)->after('personal');
            $table->boolean('test')->default(false)->after('education');
            $table->boolean('document')->default(false)->after('test');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['personal','education','test','document']);
            //
        });
    }
}
