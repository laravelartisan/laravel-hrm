<?php

namespace Erp\Models\Email;

use Erp\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Email extends Model implements AuthenticatableContract
{
    use Authenticatable;

    public $timestamps = false;
    protected $fillable = ['email','emailer_id','emailer_type','status','is_default'];

    public function emailer()
    {
        return $this->morphTo();
    }
}
