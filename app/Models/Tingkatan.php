<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tingkatan
 * @package App\Models
 * @version November 21, 2019, 5:11 am UTC
 *
 * @property string tingakatan
 */
class Tingkatan extends Model
{
    use SoftDeletes;

    public $table = 'tingkatans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tingkatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tingkatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tingkatan' => 'required'
    ];

    
}
