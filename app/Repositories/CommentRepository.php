<?php

namespace App\Repositories;

use App\Models\comment;
use App\Repositories\BaseRepository;

/**
 * Class commentRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:44 am WIB
*/

class commentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'berita_id',
        'komentar'
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
        return comment::class;
    }
}
