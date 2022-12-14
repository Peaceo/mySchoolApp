<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUserTable extends Migration
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
            $table->renameColumn('name', 'first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('username')->unique();
            $table->date('dob');
            $table->string('matric_number');
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();

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
            //
            $table->renameColumn('first_name', 'name');
            $table->dropColumn(['last_name', 'username', 'middle_name', 'dob', 'matric_number', 'faculty', 'department']);
        });
    }
}
