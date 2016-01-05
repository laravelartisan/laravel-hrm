<?php

namespace Erp\Models\Option;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{


    public $timestamps = false;

    protected $fillable = ['name','value'];

}
