<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavePhd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savedphd', function (Blueprint $table) {
            $table->increments('applNo');
            $table->string('applicationCategory', 20)->default('');
            $table->string('registrationNumber', 25)->default('');
            $table->string('chalanNo', 30)->default('');
            $table->string('imagePath', 50)->default('');
            $table->string('dept1', 50)->default('');
            $table->string('dept2', 50)->default('');
            $table->string('dept3', 50)->default('');
            $table->string('areaOfResearch', 50)->default('');
            $table->string('name', 50)->default('');
            $table->string('fatherName', 50)->default('');
            $table->string('dob', 10)->default('');
            $table->string('category', 5)->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('maritalStatus', 10)->nullable();
            $table->string('PH', 5)->nullable();
            $table->string('age', 3)->default('');
            $table->string('nationality', 20)->default('');
            $table->string('addrforcomm', 200)->default('');
            $table->string('permanentaddr', 200)->default('');
            $table->string('email', 100)->default('');
            $table->string('mobile', 15)->default('');
            $table->string('lanline', 15)->default('');
            $table->string('proexp1', 150)->default('');
            $table->string('proexp2', 150)->default('');
            $table->string('proexp3', 150)->default('');
            $table->string('position1', 20)->default('');
            $table->string('position2', 20)->default('');
            $table->string('position3', 20)->default('');
            $table->string('from1', 20)->default('');
            $table->string('from2', 20)->default('');
            $table->string('from3', 20)->default('');
            $table->string('to1', 20)->default('');
            $table->string('to2', 20)->default('');
            $table->string('to3', 20)->default('');
            $table->string('ugdegreeName', 50)->default('');
            $table->string('ugbranch', 50)->default('');
            $table->string('uggpa', 5)->default('');
            $table->string('ugclass', 15)->nullable();
            $table->string('uginstitutionName', 50)->default('');
            $table->string('uguniversityName', 50)->default('');
            $table->string('ugyop', 10)->default('');
            $table->string('pgdegreeName', 50)->default('');
            $table->string('pgbranch', 50)->default('');
            $table->string('pggpa', 5)->default('');
            $table->string('pgclass', 15)->nullable();
            $table->string('pginstitutionName', 50)->default('');
            $table->string('pguniversityName', 50)->default('');
            $table->string('pgyop', 10)->default('');
            $table->string('score', 5)->default('');
            $table->string('rank', 6)->default('');
            $table->string('discipline', 10)->default('');
            $table->string('exam', 10)->default('');
            $table->string('validity', 20)->default('');
            $table->string('pgproject', 50)->default('');
            $table->string('publications1', 150)->default('');
            $table->string('publications2', 150)->default('');
            $table->string('publications3', 150)->default('');
            $table->string('awards1', 100)->default('');
            $table->string('awards2', 100)->default('');
            $table->string('awards3', 100)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('savedphd');
    }
}
