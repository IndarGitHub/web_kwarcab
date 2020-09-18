<?php

namespace App\Repositories;

use App\Models\Kta;
use App\Repositories\BaseRepository;

/**
 * Class KtaRepository
 * @package App\Repositories
 * @version November 16, 2019, 3:42 am UTC
*/

class KtaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
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
        return Kta::class;
    }
}
