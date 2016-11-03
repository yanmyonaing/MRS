<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table='sysuser';
	protected $hidden = array('passw');
    protected $primaryKey = 'PK';

    public function Patients(){
    	return $this->belongsTo('App\Models\Patients', 'PK', 'userPK');
    }
}
