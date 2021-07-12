<?php

namespace App\Repositories;

use App\Models\StudentInfo;
use App\Repositories\BaseRepository;

/**
 * Class StudentInfoRepository
 * @package App\Repositories
 * @version July 19, 2020, 8:57 am UTC
*/

class StudentInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'rate',
        'level'
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
        return StudentInfo::class;
    }
}
