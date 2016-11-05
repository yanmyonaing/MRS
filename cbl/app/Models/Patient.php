<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table='tblpatient';
    protected $primaryKey='RegNo';
    public $incrementing = false;

    public function users(){
        return $this->belongsTo('App\Models\Users', 'userPK', 'PK');
    }

    public function summary(){
        return $this->hasMany('App\Models\Summary', 'patientPK', 'RegNo');
    }

    public function labresult(){
        return $this->hasMany('App\Models\LabResult', 'patientPK', 'RegNo');
    }

}
