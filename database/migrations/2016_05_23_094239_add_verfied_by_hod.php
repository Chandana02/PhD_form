<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerfiedByHod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function (Blueprint $table) {
            $table->boolean('verified_by_HOD')->default(false);
        });

        Schema::table('ms', function (Blueprint $table) {
            $table->boolean('verified_by_HOD')->default(false);
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
