<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTplPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpatient', function (Blueprint $table) {
            $table->string('RegNo')->index()->nullable();
            $table->date('RegDate')->nullable();
            $table->integer('titlePK')->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('NRC')->nullable();
            $table->string('Gender')->nullable();
            $table->string('FatherName')->nullable();
            $table->date('DOB')->nullable();
            $table->string('Phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('alergicInfo')->nullable();
            $table->tinyInteger('isDelete')->nullable();
            $table->integer('userPK')->nullable();
            $table->tinyInteger('createPK')->nullable();
            $table->date('createDate')->nullable();
            $table->tinyInteger('updatePK')->nullable();
            $table->date('updateDate')->nullable();
            $table->primary(array('RegNo'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblpatient');
    }
}
