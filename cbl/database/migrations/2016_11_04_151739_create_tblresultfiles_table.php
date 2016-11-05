<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblresultfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblresultfiles', function (Blueprint $table) {
            $table->integer('resultFilePK')->index()->nullable();
            $table->string('sampleID')->nullable();
            $table->string('resultFile')->nullable();
            $table->text('fileName')->nullable();
            $table->primary(array('resultFilePK'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblresultfiles');
    }
}
