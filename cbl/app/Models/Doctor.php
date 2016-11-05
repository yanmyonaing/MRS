<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table='tbldoctor';
    protected $primaryKey = 'doctorPK';


    public function summary(){
        return $this->hasOne('App\Models\Summary', 'doctorPK', 'doctorPK');
    }

    public function labresult(){
        return $this->hasOne('App\Models\LabResult', 'doctorPK', 'doctorPK');
    }

}
