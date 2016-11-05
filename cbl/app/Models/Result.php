<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table='tblresult';
    protected $primaryKey = 'SampleID';
//    public $incrementing = false;

    public function labResult(){
        return $this->hasOne('App\Models\LabResult', 'sampleID', 'SampleID');
    }

    public function fileresult(){
        return $this->hasOne('App\Models\FileResult', 'sampleID', 'SampleID');
    }
}
