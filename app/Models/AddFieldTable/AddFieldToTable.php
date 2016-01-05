<?php

namespace Erp\Models\AddFieldToTable;

use Illuminate\Database\Eloquent\Model;

class AddFieldToTable extends Model
{



    public $timestamps = false;
    protected $fillable = ['key','value','field_id','field_type'];


    public function field()
    {
        return $this->morphTo();
    }
}
