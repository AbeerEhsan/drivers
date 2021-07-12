<?php

namespace App\Http\Controllers;

use App\DataTables\StudentAttendDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentAttendRequest;
use App\Http\Requests\UpdateStudentAttendRequest;
use App\Repositories\StudentAttendRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Response;

class StudentAttendController extends AppBaseController
{
    /** @var  StudentAttendRepository */
    private $studentAttendRepository;

    public function __construct(StudentAttendRepository $studentAttendRepo)
    {
        $this->studentAttendRepository = $studentAttendRepo;
    }

    /**
     * Display a listing of the StudentAttend.
     *
     * @param StudentAttendDataTable $studentAttendDataTable
     * @return Response
     */
    public function index(StudentAttendDataTable $studentAttendDataTable , $id)
    {

        $student= User::find($id);
        if ($student->type != 'student') {
            Flash::error('حضور الطالب غير متوفر');
            return redirect('/users/student');

        }
        return view('student_attends.index' ,compact('student'));

        // return $studentAttendDataTable->render('student_attends.index');
    }

    /**
     * Show the form for creating a new StudentAttend.
     *
     * @return Response
     */
    public function create($id)
    {
        $student = User::find($id);
        return view('student_attends.create',compact('student'));
    }

    /**
     * Store a newly created StudentAttend in storage.
     *
     * @param CreateStudentAttendRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentAttendRequest $request)
    {
        $input = $request->all();

        $studentAttend = $this->studentAttendRepository->create($input);

        Flash::success('تم تسجيل حضور الطالب بنجاح');

        return redirect(route('attendance', $studentAttend->student_id));
    }

    /**
     * Display the specified StudentAttend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentAttend = $this->studentAttendRepository->find($id);

        if (empty($studentAttend)) {
            Flash::error('Student Attend not found');

            return redirect(route('studentAttends.index'));
        }

        return view('student_attends.show')->with('studentAttend', $studentAttend);
    }

    /**
     * Show the form for editing the specified StudentAttend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id , $student)
    {

        $student = User::find($student);
        $studentAttend = $this->studentAttendRepository->find($id);

        if (empty($studentAttend)) {
            Flash::error('حضور الطالب غير متوفر');

            return redirect(route('studentAttends.index'));
        }

        return view('student_attends.edit',compact('studentAttend', 'student'));
    }

    /**
     * Update the specified StudentAttend in storage.
     *
     * @param  int              $id
     * @param UpdateStudentAttendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentAttendRequest $request)
    {
        $studentAttend = $this->studentAttendRepository->find($id);

        if (empty($studentAttend)) {
            Flash::error('حضور الطالب غير متوفر');

            return redirect(route('studentAttends.index'));
        }

        $studentAttend = $this->studentAttendRepository->update($request->all(), $id);

        Flash::success('تم تعديل بيانات حضور الطالب');

        return redirect(route('attendance', $studentAttend->student_id));
    }

    /**
     * Remove the specified StudentAttend from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentAttend = $this->studentAttendRepository->find($id);

        if (empty($studentAttend)) {
            Flash::error('حضور الطالب غير متوفر');

            return redirect(route('studentAttends.index'));
        }

        $this->studentAttendRepository->delete($id);

        Flash::success('تم حذف تسجيل حضورالطالب بنجاح');

        return redirect(route('attendance', $studentAttend->student_id));
    }
}
