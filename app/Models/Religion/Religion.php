<?php

namespace Erp\Models\Religion;

use Illuminate\Database\Eloquent\Model;
use Erp\Models\User\User;

class Religion extends Model
{

    public $timestamps = false;

    protected $fillable = ['name','status'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
