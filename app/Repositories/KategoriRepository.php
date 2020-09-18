<?php

namespace App\Repositories;

use App\Models\Kategori;
use App\Repositories\BaseRepository;

/**
 * Class KategoriRepository
 * @package App\Repositories
 * @version November 1, 2019, 3:30 am UTC
*/

class KategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Kategori::class;
    }
}
