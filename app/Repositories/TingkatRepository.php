<?php

namespace App\Repositories;

use App\Models\Tingkat;
use App\Repositories\BaseRepository;

/**
 * Class TingkatRepository
 * @package App\Repositories
 * @version November 1, 2019, 3:31 am UTC
*/

class TingkatRepository extends BaseRepository
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
        return Tingkat::class;
    }
}
