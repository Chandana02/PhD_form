<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResubmittedFlag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function (Blueprint $table) {
            $table->renameColumn('form1_submitted', 're_submitted');
            $table->dropColumn('form2_submitted');
            $table->dropColumn('form3_submitted');
        });

        Schema::table('ms', function (Blueprint $table) {
            $table->renameColumn('cert_submitted', 're_submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd', function (Blueprint $table) {
            //
        });
    }
}
