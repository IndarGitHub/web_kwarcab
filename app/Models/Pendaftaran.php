<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pendaftaran
 * @package App\Models
 * @version November 21, 2019, 6:16 am UTC
 *
 * @property integer kta_id
 * @property integer user_id
 * @property string no_tlp
 * @property string nama_gudep
 * @property string tempat_lahir
 * @property string tanggal_lahir
 * @property integer jenis_kelamin_id
 * @property integer tingkatan_id
 * @property string bukti_pembayaran
 */
class Pendaftaran extends Model
{
    use SoftDeletes;

    public $table = 'pendaftarans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kta_id',
        'user_id',
        'no_tlp',
        'nama_gudep',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tingkatan_id',
        'bukti_pembayaran',
        'upload_berkas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kta_id' => 'integer',
        'user_id' => 'integer',
        'no_tlp' => 'string',
        'nama_gudep' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'integer',
        'tingkatan_id' => 'integer',
        'bukti_pembayaran' => 'string',
        'upload_berkas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kta_id' => 'required',
        'user_id' => 'required',
        'no_tlp' => 'required',
        'nama_gudep' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'tingkatan_id' => 'required',
        'bukti_pembayaran' => 'image',
        // 'bukti_pembayaran' => 'mimes:jpeg,bmp,png',
        // 'upload_berkas' => 'file'
    ];

    public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'user_id');
   }
   public function kta()
   {
       return $this->belongsTo(\App\Models\Kta::class, 'kta_id');
   }
   public function tingkatan()
   {
       return $this->belongsTo(\App\Models\Tingkatan::class, 'tingkatan_id');
   }       
}
