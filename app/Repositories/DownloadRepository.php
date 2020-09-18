<?php

namespace App\Repositories;

use App\Models\Download;
use App\Repositories\BaseRepository;

/**
 * Class DownloadRepository
 * @package App\Repositories
 * @version November 23, 2019, 3:28 am UTC
*/

class DownloadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'user_id',
        'keterangan',
        'file_download',
        'status_file',
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
        return Download::class;
    }
}
