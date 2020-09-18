<?php

namespace App\Repositories;

use App\Models\Pendaftaran;
use App\Repositories\BaseRepository;

/**
 * Class PendaftaranRepository
 * @package App\Repositories
 * @version November 21, 2019, 6:16 am UTC
*/

class PendaftaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pendaftaran::class;
    }
}
