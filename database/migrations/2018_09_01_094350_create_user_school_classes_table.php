<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_school_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('schoolClassId')->unsigned();

            $table->date('from');
            $table->date('to');

            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('schoolClassId')->references('id')->on('school_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_school_classes', function(Blueprint $table) {
            $table->dropForeign(['userId']);
            $table->dropForeign(['schoolClassId']);
        });

        Schema::dropIfExists('user_school_classes');
    }
}
