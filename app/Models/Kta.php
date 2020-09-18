<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kta
 * @package App\Models
 * @version November 16, 2019, 3:42 am UTC
 *
 * @property integer nomor
 * @property string name
 */
class Kta extends Model
{
    use SoftDeletes;

    public $table = 'ktas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required',
        'name' => 'required'
    ];

    
}
