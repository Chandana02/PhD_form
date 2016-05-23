<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSelectedDeptsField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function (Blueprint $table) {
            $table->string('selected_depts', 15)->default('');
        });

        Schema::table('ms', function (Blueprint $table) {
            $table->string('selected_depts', 15)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
