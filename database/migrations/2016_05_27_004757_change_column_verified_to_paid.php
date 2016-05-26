<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnVerifiedToPaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd', function($table)
        {
            $table->renameColumn('verified_by_HOD', 'paidornot');
        });

        Schema::table('ms', function($table)
        {
            $table->renameColumn('verified_by_HOD', 'paidornot');
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
