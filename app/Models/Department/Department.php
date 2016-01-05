<?php

namespace Erp\Models\Department;

use Erp\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Erp\Models\User\User;

class Department extends Model
{

   public $timestamps = false;
   protected $fillable = ['name','company_id','status','position'];

    public function company()
    {
        $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
