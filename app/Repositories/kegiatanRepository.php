<?php

namespace App\Repositories;

use App\Models\kegiatan;
use App\Repositories\BaseRepository;

/**
 * Class kegiatanRepository
 * @package App\Repositories
 * @version June 10, 2020, 2:56 pm WIB
*/

class kegiatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'user_id',
        'judul_kegiatan',
        'isi_kegiatan',
        'picture',
        'status'
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
        return kegiatan::class;
    }
}
