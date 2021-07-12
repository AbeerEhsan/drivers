<?php

namespace App\Http\Controllers;

use App\DataTables\BusStudentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusStudentRequest;
use App\Http\Requests\UpdateBusStudentRequest;
use App\Repositories\BusStudentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Bus;
use App\Models\User;
use Response;

class BusStudentController extends AppBaseController
{
    /** @var  BusStudentRepository */
    private $busStudentRepository;

    public function __construct(BusStudentRepository $busStudentRepo)
    {
        $this->busStudentRepository = $busStudentRepo;
    }

    /**
     * Display a listing of the BusStudent.
     *
     * @param BusStudentDataTable $busStudentDataTable
     * @return Response
     */
    public function index(BusStudentDataTable $busStudentDataTable, $id)
    {
        $bus = Bus::find($id);
        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busStudents.index'));
        }

        // dd($bus->busStudents);
        // if ($bus->type != 'student') {
        //     Flash::error('Student Attend not found');
        //     return redirect('/users/student');
        // }
        return view('bus_students.index', compact('bus'));
    }

    /**
     * Show the form for creating a new BusStudent.
     *
     * @return Response
     */
    public function create($id)
    {
        $bus = Bus::find($id);
        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busStudents.index'));
        }
        $users = User::where('type', 'student')->get();

        return view('bus_students.create', compact('bus','users'));
    }

    /**
     * Store a newly created BusStudent in storage.
     *
     * @param CreateBusStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateBusStudentRequest $request)
    {
        $input = $request->all();

        $busStudent = $this->busStudentRepository->create($input);

        Flash::success('تم تسجيل الطالب بالباص بنجاح');

        return redirect(route('bus_Students', $busStudent->bus_id));


    }

    /**
     * Display the specified BusStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $busStudent = $this->busStudentRepository->find($id);

        if (empty($busStudent)) {
            Flash::error('Bus Student not found');

            return redirect(route('busStudents.index'));
        }

        return view('bus_students.show')->with('busStudent', $busStudent);
    }

    /**
     * Show the form for editing the specified BusStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $busStudent = $this->busStudentRepository->find($id);

        if (empty($busStudent)) {
            Flash::error('Bus Student not found');

            return redirect(route('busStudents.index'));
        }

        return view('bus_students.edit')->with('busStudent', $busStudent);
    }

    /**
     * Update the specified BusStudent in storage.
     *
     * @param  int              $id
     * @param UpdateBusStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusStudentRequest $request)
    {
        $busStudent = $this->busStudentRepository->find($id);

        if (empty($busStudent)) {
            Flash::error('Bus Student not found');

            return redirect(route('busStudents.index'));
        }

        $busStudent = $this->busStudentRepository->update($request->all(), $id);

        Flash::success('Bus Student updated successfully.');

        return redirect(route('bus_Students'), $busStudent->bus_id);
    }

    /**
     * Remove the specified BusStudent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $busStudent = $this->busStudentRepository->find($id);

        if (empty($busStudent)) {
            Flash::error('الطالب غير مسجل في الباص ');

            return redirect(route('busStudents.index'));
        }

        $this->busStudentRepository->delete($id);

        Flash::success('تم حذف الطالب من الباص ');

        return redirect(route('bus_Students', $busStudent->bus_id));
    }
}
