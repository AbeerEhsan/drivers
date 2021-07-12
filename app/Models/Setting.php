<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version July 19, 2020, 8:56 am UTC
 *
 * @property string $privacy
 * @property string $terms
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'privacy',
        'terms'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'privacy' => 'string',
        'terms' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'privacy' => 'required',
        'terms' => 'required'
    ];

    
}
