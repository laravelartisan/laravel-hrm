<?php

namespace Erp\Models\Log;

use Illuminate\Database\Eloquent\Model;

class LogTable extends Model
{

    public $timestamps = false;
    protected $fillable = ['message','created_by','loggable_id','loggable_type','ip_address','created_at'];

    public function loggable()
    {
        return $this->morphTo();
    }
}
