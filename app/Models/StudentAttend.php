<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StudentAttend
 * @package App\Models
 * @version July 19, 2020, 8:58 am UTC
 *
 * @property \App\Models\User $student
 * @property integer $student_id
 * @property string $attendance
 */
class StudentAttend extends Model
{
    use SoftDeletes;

    public $table = 'student_attend';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'attendance',
        'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'attendance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required',
        'attendance' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id');
    }
}
