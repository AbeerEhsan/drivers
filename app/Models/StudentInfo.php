<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StudentInfo
 * @package App\Models
 * @version July 19, 2020, 8:57 am UTC
 *
 * @property \App\Models\User $student
 * @property integer $student_id
 * @property string $rate
 * @property string $level
 */
class StudentInfo extends Model
{
    // use SoftDeletes;

    public $table = 'student_info';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'rate',
        'level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'rate' => 'string',
        'level' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|unique:student_info',
        'rate' => 'required',
        'level' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id');
    }
}
