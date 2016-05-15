<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Make6Awards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savedms', function (Blueprint $table) {
            $table->string('awards4', 100)->default('');
            $table->string('awards5', 100)->default('');
            $table->string('awards6', 100)->default('');
        });
        Schema::table('savedphd', function (Blueprint $table) {
            $table->string('awards4', 100)->default('');
            $table->string('awards5', 100)->default('');
            $table->string('awards6', 100)->default('');
        });
        Schema::table('msother', function (Blueprint $table) {
            $table->string('awards4', 100)->default('');
            $table->string('awards5', 100)->default('');
            $table->string('awards6', 100)->default('');
        });
        Schema::table('phdother', function (Blueprint $table) {
            $table->string('awards4', 100)->default('');
            $table->string('awards5', 100)->default('');
            $table->string('awards6', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
