<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Download
 * @package App\Models
 * @version November 23, 2019, 3:28 am UTC
 *
 * @property string judul
 * @property string tanggal
 * @property integer user_id
 * @property time jam
 * @property string keterangan
 * @property string file_download
 */
class Download extends Model
{
    use SoftDeletes;

    public $table = 'downloads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'user_id',
        'keterangan',
        'file_download',
        'status_file',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'user_id' => 'integer',
        'keterangan' => 'string',
        'file_download' => 'string',
        'status_file' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'user_id' => 'required',
        'keterangan' => 'required',
        'file_download' => 'mimes:pdf',
        'status_file' => 'required',
    ];

    public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'user_id');
   }

    
}
