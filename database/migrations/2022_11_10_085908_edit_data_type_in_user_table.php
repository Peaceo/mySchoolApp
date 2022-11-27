<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDataTypeInUserTable extends Migration
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
            $table->text('faculty_id')->change()->nullable();
            $table->text('department_id')->change()->nullable();
            // $table->bigInteger('faculty_id')->charset(null)->collation(null)->change();
            // $table->bigInteger('department_id')->charset(null)->collation(null)->change();
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
            $table->dropColumn(['faculty_id', 'department_id']);
        });
    }
}
