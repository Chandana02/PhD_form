<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeLengthChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phdother', function (Blueprint $table) {
            $table->string('pgproject', 1000)->change();
            $table->string('discipline', 1000)->change();
            $table->string('publications1', 1000)->change();
            $table->string('publications2', 1000)->change();
            $table->string('publications3', 1000)->change();
            $table->string('publications4', 1000)->change();
            $table->string('publications5', 1000)->change();
            $table->string('publications6', 1000)->change();
            $table->string('awards1', 1000)->change();
            $table->string('awards2', 1000)->change();
            $table->string('awards3', 1000)->change();
            $table->string('awards4', 1000)->change();
            $table->string('awards5', 1000)->change();
            $table->string('awards6', 1000)->change();
        });

        Schema::table('savedphd', function (Blueprint $table) {
            $table->string('pgproject', 1000)->change();
            $table->string('discipline', 1000)->change();
            $table->string('publications1', 1000)->change();
            $table->string('publications2', 1000)->change();
            $table->string('publications3', 1000)->change();
            $table->string('publications4', 1000)->change();
            $table->string('publications5', 1000)->change();
            $table->string('publications6', 1000)->change();
            $table->string('awards1', 1000)->change();
            $table->string('awards2', 1000)->change();
            $table->string('awards3', 1000)->change();
            $table->string('awards4', 1000)->change();
            $table->string('awards5', 1000)->change();
            $table->string('awards6', 1000)->change();
        });

        Schema::table('msother', function (Blueprint $table) {
            $table->string('discipline', 1000)->change();
        });

        Schema::table('savedms', function (Blueprint $table) {
            $table->string('discipline', 1000)->change();
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
