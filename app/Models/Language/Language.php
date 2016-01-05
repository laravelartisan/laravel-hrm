<?php

namespace Erp\Models\Language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $fillable = ['name','iso_code','is_rtl','status','position'];

    public $timestamps = false;


}
