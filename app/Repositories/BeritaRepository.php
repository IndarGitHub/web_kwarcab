<?php

namespace App\Repositories;

use App\Models\Berita;
use App\Repositories\BaseRepository;

/**
 * Class BeritaRepository
 * @package App\Repositories
 * @version November 15, 2019, 4:18 am UTC
*/

class BeritaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'user_id',
        'judul',
        'picture',
        'isi',
        'status',
        'persetujuan_berita'
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
        return Berita::class;
    }
}
