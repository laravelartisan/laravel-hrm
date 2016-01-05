<?php

namespace Erp\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'address'];


}
