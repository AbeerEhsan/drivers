<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version July 19, 2020, 8:36 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $busInfos
 * @property \Illuminate\Database\Eloquent\Collection $busStudents
 * @property \Illuminate\Database\Eloquent\Collection $buses
 * @property \Illuminate\Database\Eloquent\Collection $studentAttends
 * @property \Illuminate\Database\Eloquent\Collection $studentInfos
 * @property string $name
 * @property integer $phone
 * @property string $img
 * @property string $type
 * @property string $details
 * @property string $address
 * @property string $location
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone',
        'img',
        'type',
        'details',
        'address',
        'location',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'integer',
        'img' => 'string',
        'type' => 'string',
        'details' => 'string',
        'address' => 'string',
        'location' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        // 'img' => 'required',
        'type' => 'required',
        'location' => 'required',
        // 'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function busInfos()
    {
        return $this->hasMany(\App\Models\BusInfo::class, 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function busStudents()
    {
        return $this->hasMany(\App\Models\BusStudent::class, 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function buses()
    {
        return $this->hasMany(\App\Models\Bus::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function studentAttends()
    {
        return $this->hasMany(\App\Models\StudentAttend::class, 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function studentInfos()
    {
        return $this->hasMany(\App\Models\StudentInfo::class, 'student_id');
    }
}
