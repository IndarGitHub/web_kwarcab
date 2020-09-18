<?php

namespace App\Repositories;

use App\Models\Tingkatan;
use App\Repositories\BaseRepository;

/**
 * Class TingkatanRepository
 * @package App\Repositories
 * @version November 21, 2019, 5:11 am UTC
*/

class TingkatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tingakatan'
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
        return Tingkatan::class;
    }
}
