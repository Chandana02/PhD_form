<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormSubmittedFieldToPhd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function (Blueprint $table) {
            $table->boolean('form1_submitted')->default(false);
            $table->boolean('form2_submitted')->default(false);
            $table->boolean('form3_submitted')->default(false);
        });

        Schema::table('savedphd', function (Blueprint $table) {
            $table->boolean('form1_submitted')->default(false);
            $table->boolean('form2_submitted')->default(false);
            $table->boolean('form3_submitted')->default(false);
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
