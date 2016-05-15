<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Make6EmployersToSavedPhd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savedphd', function (Blueprint $table) {
            $table->string('proexp4', 150)->default('');
            $table->string('proexp5', 150)->default('');
            $table->string('proexp6', 150)->default('');
            $table->string('position4', 20)->default('');
            $table->string('position5', 20)->default('');
            $table->string('position6', 20)->default('');
            $table->string('from4', 20)->default('');
            $table->string('from5', 20)->default('');
            $table->string('from6', 20)->default('');
            $table->string('to4', 20)->default('');
            $table->string('to5', 20)->default('');
            $table->string('to6', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('savedphd', function (Blueprint $table) {
            //
        });
    }
}
