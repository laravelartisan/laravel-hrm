<?php

namespace Erp\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyGroup extends Model
{

    public $timestamps = false;
    protected $fillable = ['name'];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }



}
