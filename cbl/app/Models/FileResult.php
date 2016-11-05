<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileResult extends Model
{
    protected $table='tblresultfiles';
    protected $primaryKey = 'resultFilePK';
    public $incrementing = false;


    public function result(){
        return $this->belongsTo('App\Models\Result', 'sampleID', 'SampleID');
    }

    public function labResult(){
        return $this->belongsTo('App\Models\LabResult', 'sampleID', 'sampleID');
    }

}
