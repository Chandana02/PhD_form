<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function (Blueprint $table) {
            $table->string('dept1_comments', 1000)->default('');
            $table->string('dept2_comments', 1000)->default('');
            $table->string('dept3_comments', 1000)->default('');
        });

        Schema::table('ms', function (Blueprint $table) {
            $table->string('dept1_comments', 1000)->default('');
            $table->string('dept2_comments', 1000)->default('');
            $table->string('dept3_comments', 1000)->default('');
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
