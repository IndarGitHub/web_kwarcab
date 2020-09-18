<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comment
 * @package App\Models
 * @version June 10, 2020, 10:44 am WIB
 *
 * @property integer $berita_id
 * @property string $komentar
 */
class comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'berita_id',
        'user_id',
        'komentar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'berita_id' => 'integer',
        'user_id' => 'integer',
        'komentar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'berita_id' => 'required'
    ];

   public function user()
   {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
   }
   public function berita()
   {
        return $this->belongsTo(\App\Models\Berita::class, 'berita_id');
   }
    
}
