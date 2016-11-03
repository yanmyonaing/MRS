<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table='tblpatient';
    protected $primaryKey='RegNo';

    

    public function Users(){
    	return $this->hasOne('App\Models\Users','PK', 'userPK');
    }
}
