<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Berita
 * @package App\Models
 * @version November 15, 2019, 4:18 am UTC
 *
 * @property integer category_id
 * @property  user_id
 * @property string judul
 * @property string picture
 * @property textarea isi
 * @property integer comment_id
 */
class Berita extends Model
{
    use SoftDeletes;

    public $table = 'beritas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'user_id',
        'judul',
        'picture',
        'isi',
        'status',
        'persetujuan_berita',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'judul' => 'string',
        'picture' => 'string',
        'isi' => 'text',
        'status' => 'integer',
        'persetujuan_berita' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'user_id' => 'required',
        'judul' => 'required',
        'picture' => 'mimes:jpeg,bmp,png',
        'isi' => 'required',
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
