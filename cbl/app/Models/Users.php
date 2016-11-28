<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class Users extends Model implements Authenticatable
{
	protected $table='sysuser';
    protected $primaryKey = 'PK';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'login',
        'passw'
    ];

    public function patient(){
    	return $this->hasOne('App\Models\Patient', 'userPK', 'PK');
    }

    public function setPasswordAttribute($password){
        $this->attributes['passw'] = MD5($password);
    }
    public function getAuthIdentifierName(){
        return $this->login;
    }
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->passw;
    }
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }
    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }


}
