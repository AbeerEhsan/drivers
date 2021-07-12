<?php

namespace App\Http\Controllers;

use App\DataTables\BusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Repositories\BusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Response;

class BusController extends AppBaseController
{
    /** @var  BusRepository */
    private $busRepository;

    public function __construct(BusRepository $busRepo)
    {
        $this->busRepository = $busRepo;
    }

    /**
     * Display a listing of the Bus.
     *
     * @param BusDataTable $busDataTable
     * @return Response
     */
    public function index(BusDataTable $busDataTable)
    {
        return $busDataTable->render('buses.index');
    }

    /**
     * Show the form for creating a new Bus.
     *
     * @return Response
     */
    public function create()
    {
        $users=User::where('type','driver')->get();
        return view('buses.create',compact('users'));
    }

    /**
     * Store a newly created Bus in storage.
     *
     * @param CreateBusRequest $request
     *
     * @return Response
     */
    public function store(CreateBusRequest $request)
    {
        $input = $request->all();

        $bus = $this->busRepository->create($input);

        Flash::success('تم حفظ معلومات الباص بنجاح');

        return redirect(route('busess.index'));
    }

    /**
     * Display the specified Bus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bus = $this->busRepository->find($id);

        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busess.index'));
        }

        return view('buses.show')->with('bus', $bus);
    }

    /**
     * Show the form for editing the specified Bus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = User::where('type', 'driver')->get();
        $bus = $this->busRepository->find($id);

        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busess.index'));
        }

        return view('buses.edit',compact('bus','users'));
    }

    /**
     * Update the specified Bus in storage.
     *
     * @param  int              $id
     * @param UpdateBusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusRequest $request)
    {
        $bus = $this->busRepository->find($id);

        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busess.index'));
        }

        $bus = $this->busRepository->update($request->all(), $id);

        Flash::success('تم تعديل بيانات الباص بنجاح');

        return redirect(route('busess.index'));
    }

    /**
     * Remove the specified Bus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bus = $this->busRepository->find($id);

        if (empty($bus)) {
            Flash::error('الباص المطلوب غير متوفر');

            return redirect(route('busess.index'));
        }

        $this->busRepository->delete($id);

        Flash::success('تم حذف الباص بنجاح');

        return redirect(route('busess.index'));
    }
}
