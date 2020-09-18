<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kegiatan
 * @package App\Models
 * @version June 10, 2020, 2:56 pm WIB
 *
 * @property integer $category_id
 * @property integer $user_id
 * @property string $judul_kegiatan
 * @property string $isi_kegiatan
 * @property string $picture
 * @property integer $status
 */
class kegiatan extends Model
{
    use SoftDeletes;

    public $table = 'kegiatans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'user_id',
        'judul_kegiatan',
        'isi_kegiatan',
        'picture',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'user_id' => 'integer',
        'judul_kegiatan' => 'string',
        'isi_kegiatan' => 'string',
        'picture' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'user_id' => 'required',
        'judul_kegiatan' => 'required',
        'picture' => 'mimes:jpeg,bmp,png',
        'status' => 'required'
    ];

    public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'user_id');
   }
   public function category()
   {
       return $this->belongsTo(\App\Models\Category::class, 'category_id');
   }
}
