<?php

namespace Erp\Models\Media;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $table = 'media';

    public $timestamps = false;

    protected $fillable = ['name','extension','path'];

}
