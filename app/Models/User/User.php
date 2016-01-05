<?php

namespace Erp\Models\User;

use Dimsav\Translatable\Translatable;
use Erp\Models\AddFieldToTable\AddFieldToTable;
use Erp\Models\Company\Company;
use Erp\Models\Department\Department;
use Erp\Models\Email\Email;
use Erp\Models\Gender\Gender;
use Erp\Models\Log\LogTable;
use Erp\Models\Password\Password;
use Erp\Models\Religion\Religion;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Erp\Models\Role\HasRoles;
use Illuminate\Support\Facades\Hash;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoles, Translatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const USER_NAME = 'username';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender_id';
    const RELIGION = 'religion_id';
    const COMPANY  = 'company_id';
    const DEPARTMENT  = 'department_id';
    const PHONE = 'phone';
    const ADDRESS = 'address';
    const STATUS   = 'status';
    const PASSWORD = 'password';
    const EMAIL = 'email';
    const CONFIRM_PASSWORD = 'password_confirmation';

    const REMEMBER_TOKEN = 'remember_token';


    public $translatedAttributes = [self::FIRST_NAME, self::LAST_NAME, self::ADDRESS];
    public $timestamps = false;

    protected $fillable = [
                            self::USER_NAME,
                            self::FIRST_NAME,
                            self::LAST_NAME,
                            self::GENDER,
                            self::RELIGION,
                            self::COMPANY,
                            self::DEPARTMENT,
                            self::PHONE,
                            self::ADDRESS,
                            self::STATUS
                          ];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ self::REMEMBER_TOKEN ];



    /*public function setPasswordAttribute($pass){

        $this->attributes['password'] = Hash::make($pass);

    }*/

    /**
     * more than one user should belong to a gender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {

        return $this->belongsTo(Gender::class);
    }

    /**
     * more than one user should belong to a company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * more than one user should belong to a department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * more than one user should belong to a religion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    /**
     * a user might have more than one password
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passwords()
    {
        return $this->hasMany(Password::class);
    }

    /**
     * a user might have more than one email
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {

        return $this->morphMany(Email::class,'emailer');
    }

    /**
     * each activities should remain in log table
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function logs()
    {
        return $this->morphMany(LogTable::class,'loggable');
    }

    /**
     * each table might add different fields
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function addFieldsToTable()
    {
        return $this->morphMany(AddFieldToTable::class,'field');
    }


}
