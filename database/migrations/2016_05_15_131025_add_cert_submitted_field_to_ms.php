<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCertSubmittedFieldToMs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ms', function (Blueprint $table) {
            $table->boolean('cert_submitted')->default(false);
        });

        Schema::table('savedms', function (Blueprint $table) {
            $table->boolean('cert_submitted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ms', function (Blueprint $table) {
            //
        });
    }
}
