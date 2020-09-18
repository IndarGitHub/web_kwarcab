<?php

namespace App\Repositories;

use App\Models\Kepramukaan;
use App\Repositories\BaseRepository;

/**
 * Class KepramukaanRepository
 * @package App\Repositories
 * @version November 16, 2019, 3:08 am UTC
*/

class KepramukaanRepository extends BaseRepository
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
        return Kepramukaan::class;
    }
}
