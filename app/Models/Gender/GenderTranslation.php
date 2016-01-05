<?php

namespace Erp\Models\Gender;

use Illuminate\Database\Eloquent\Model;

class GenderTranslation extends Model
{

    public $timestamps = false;
    protected $fillable = ['gender_name'];
}
