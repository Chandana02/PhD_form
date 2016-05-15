<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phdother', function (Blueprint $table) {
            $table->string('publications4', 150)->default('');
            $table->string('publications5', 150)->default('');
            $table->string('publications6', 150)->default('');
        });

        Schema::table('savedphd', function (Blueprint $table) {
            $table->string('publications4', 150)->default('');
            $table->string('publications5', 150)->default('');
            $table->string('publications6', 150)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phdother', function (Blueprint $table) {
            //
        });
    }
}
