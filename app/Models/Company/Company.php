<?php

namespace Erp\Models\Company;

use Erp\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use Erp\Models\User\User;

class Company extends Model
{

    public $timestamps = false;
    protected $fillable = ['name','main_url','logical_url','physical_url','group_id','status','position','is_default'];


    public function group()
    {
        return $this->belongsTo(CompanyGroup::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
