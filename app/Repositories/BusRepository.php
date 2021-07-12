<?php

namespace App\Repositories;

use App\Models\Bus;
use App\Repositories\BaseRepository;

/**
 * Class BusRepository
 * @package App\Repositories
 * @version July 19, 2020, 8:36 am UTC
*/

class BusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'user_id'
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
        return Bus::class;
    }
}
