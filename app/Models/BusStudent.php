<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusStudent
 * @package App\Models
 * @version July 19, 2020, 8:55 am UTC
 *
 * @property \App\Models\Bus $bus
 * @property \App\Models\User $student
 * @property integer $student_id
 * @property integer $bus_id
 */
class BusStudent extends Model
{
    // use SoftDeletes;

    public $table = 'bus_student';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'bus_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'bus_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|unique:bus_student',
        'bus_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bus()
    {
        return $this->belongsTo(\App\Models\Bus::class, 'bus_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id');
    }
}
