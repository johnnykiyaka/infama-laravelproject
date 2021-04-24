<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\BaseRepository;

/**
 * Class MovieRepository
 * @package App\Repositories
 * @version April 24, 2021, 5:35 am UTC
*/

class MovieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'series',
        'seriesStart',
        'seriesEnds'
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
        return Movie::class;
    }
}
