<?php

namespace App\Http\Controllers;

use App\DataTables\StudentInfoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentInfoRequest;
use App\Http\Requests\UpdateStudentInfoRequest;
use App\Repositories\StudentInfoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Response;

class StudentInfoController extends AppBaseController
{
    /** @var  StudentInfoRepository */
    private $studentInfoRepository;

    public function __construct(StudentInfoRepository $studentInfoRepo)
    {
        $this->studentInfoRepository = $studentInfoRepo;
    }

    /**
     * Display a listing of the StudentInfo.
     *
     * @param StudentInfoDataTable $studentInfoDataTable
     * @return Response
     */
    public function index(StudentInfoDataTable $studentInfoDataTable)
    {
        return $studentInfoDataTable->render('student_infos.index');
    }

    /**
     * Show the form for creating a new StudentInfo.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::where('type', 'student')->get();
        return view('student_infos.create', compact('users'));
    }

    /**
     * Store a newly created StudentInfo in storage.
     *
     * @param CreateStudentInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentInfoRequest $request)
    {
        $input = $request->all();

        $studentInfo = $this->studentInfoRepository->create($input);

        Flash::success('تم حفظ معلومات الطالب بنجاح '); 

        return redirect(route('studentInfos.index'));
    }

    /**
     * Display the specified StudentInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('معلومات الطالب غير متوفرة');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.show')->with('studentInfo', $studentInfo);
    }

    /**
     * Show the form for editing the specified StudentInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = User::where('type', 'student')->get();
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('معلومات الطالب غير متوفرة');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.edit',compact('studentInfo', 'users'));
    }

    /**
     * Update the specified StudentInfo in storage.
     *
     * @param  int              $id
     * @param UpdateStudentInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentInfoRequest $request)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('معلومات الطالب غير متوفرة');

            return redirect(route('studentInfos.index'));
        }

        $studentInfo = $this->studentInfoRepository->update($request->all(), $id);

        Flash::success('تم تعديل معلومات الطالب بنجاح');

        return redirect(route('studentInfos.index'));
    }

    /**
     * Remove the specified StudentInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('معلومات الطالب غير متوفرة');

            return redirect(route('studentInfos.index'));
        }

        $this->studentInfoRepository->delete($id);

        Flash::success('تم حذف معلومات الطالب بنجاح');

        return redirect(route('studentInfos.index'));
    }
}
