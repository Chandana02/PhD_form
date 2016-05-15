<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Make6Employers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msProexp', function (Blueprint $table) {
            $table->string('proexp4', 150);
            $table->string('proexp5', 150);
            $table->string('proexp6', 150);
            $table->string('position4', 20);
            $table->string('position5', 20);
            $table->string('position6', 20);
            $table->string('from4', 20);
            $table->string('from5', 20);
            $table->string('from6', 20);
            $table->string('to4', 20);
            $table->string('to5', 20);
            $table->string('to6', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('msProexp', function (Blueprint $table) {
            //
        });
    }
}
