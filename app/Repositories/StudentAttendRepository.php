<?php

namespace App\Repositories;

use App\Models\StudentAttend;
use App\Repositories\BaseRepository;

/**
 * Class StudentAttendRepository
 * @package App\Repositories
 * @version July 19, 2020, 8:58 am UTC
*/

class StudentAttendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'attendance'
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
        return StudentAttend::class;
    }
}
