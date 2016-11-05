<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $table='tbllabtechnicianrequest';
    protected $primaryKey = 'labtechnicianrequestPK';

    public function patient(){
        return $this->belongsTo('App\Models\Patient', 'patientPK', 'RegNo');
    }

    public function result(){
        return $this->belongsTo('App\Models\Result','sampleID','SampleID');
    }

    public function fileResult(){
        return $this->belongsTo('App\Models\Result','sampleID','SampleID');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor','doctorPK','doctorPK');
    }
}
