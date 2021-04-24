<?php

namespace App\Repositories;

use App\Models\flight;
use App\Repositories\BaseRepository;

/**
 * Class flightRepository
 * @package App\Repositories
 * @version April 24, 2021, 5:31 am UTC
*/

class flightRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movie',
        'start',
        'stop'
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
        return flight::class;
    }
}
