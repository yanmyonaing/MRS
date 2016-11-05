<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table='sysuser';
    protected $primaryKey = 'PK';
    public $timestamps = false;

    public function patient(){
    	return $this->hasOne('App\Models\Patient', 'userPK', 'PK');
    }
    
}
