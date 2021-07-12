<?php

namespace App\Repositories;

use App\Models\BusStudent;
use App\Repositories\BaseRepository;

/**
 * Class BusStudentRepository
 * @package App\Repositories
 * @version July 19, 2020, 8:55 am UTC
*/

class BusStudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'bus_id'
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
        return BusStudent::class;
    }
}
