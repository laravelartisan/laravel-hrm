<?php

namespace Erp\Models\Password;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Erp\Models\User\User;
use Illuminate\Support\Facades\Hash;

class Password extends Model implements AuthenticatableContract //not being used now....for further intelligence
{
    use Authenticatable; //not being used now... for further intelligence

    const PASSWORD = 'password';
    const STATUS = 'status';
    const USER_ID = 'user_id';
    const IS_DEFAULT ='is_default';

    public $timestamps = false;

    protected $fillable = [self::PASSWORD,self::STATUS,self::USER_ID,self::IS_DEFAULT];


    protected $hidden = [ self:: PASSWORD ];

    /**
     * @param $pass
     */
   /* public function setPasswordAttribute($pass){

        $this->attributes['password'] = Hash::make($pass);

    }*/

    /**
     * a user might have more than one password
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
