<?php

namespace App\Repositories;

use App\Models\CommentKegiatan;
use App\Repositories\BaseRepository;

/**
 * Class CommentKegiatanRepository
 * @package App\Repositories
 * @version June 21, 2020, 6:41 pm WIB
*/

class CommentKegiatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kegiatan_id',
        'user_id',
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
        return CommentKegiatan::class;
    }
}
