<?php

namespace Erp\Models\Gender;

use Dimsav\Translatable\Translatable;
use Erp\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use Translatable;

    const NAME = 'gender_name';
    const STATUS = 'status';

    public $timestamps = false;

    protected $fillable = [self::NAME, self::STATUS];
    public $translatedAttributes = [self::NAME];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
