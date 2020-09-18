<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CommentKegiatan
 * @package App\Models
 * @version June 21, 2020, 6:41 pm WIB
 *
 * @property integer $kegiatan_id
 * @property integer $user_id
 * @property string $komentar
 */
class CommentKegiatan extends Model
{
    use SoftDeletes;

    public $table = 'comment_kegiatans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kegiatan_id',
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
        'kegiatan_id' => 'integer',
        'user_id' => 'integer',
        'komentar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kegiatan_id' => 'required',
        'user_id' => 'required'
    ];

    public function user()
   {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
   }
   public function kegiatan()
   {
        return $this->belongsTo(\App\Models\Kegiatan::class, 'kegiatan_id');
   }
    
}
