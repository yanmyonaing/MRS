<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table='tblsummary';
    protected $primaryKey = 'summaryPK';

    public function patient(){
        return $this->belongsTo('App\Models\Patient', 'patientPK', 'RegNo');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctorPK', 'doctorPK');
    }

}
