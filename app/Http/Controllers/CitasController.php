<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCitasRequest;
use App\Http\Requests\UpdateCitasRequest;
use App\Repositories\CitasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CitasController extends AppBaseController
{
    /** @var  CitasRepository */
    private $citasRepository;

    public function __construct(CitasRepository $citasRepo)
    {
        $this->citasRepository = $citasRepo;
    }

    /**
     * Display a listing of the Citas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $citas = $this->citasRepository->all();

        return view('citas.index')
            ->with('citas', $citas);
    }

    /**
     * Show the form for creating a new Citas.
     *
     * @return Response
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created Citas in storage.
     *
     * @param CreateCitasRequest $request
     *
     * @return Response
     */
    public function store(CreateCitasRequest $request)
    {
        $input = $request->all();

        $citas = $this->citasRepository->create($input);

        Flash::success('Citas saved successfully.');

        return redirect(route('citas.index'));
    }

    /**
     * Display the specified Citas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $citas = $this->citasRepository->find($id);

        if (empty($citas)) {
            Flash::error('Citas not found');

            return redirect(route('citas.index'));
        }

        return view('citas.show')->with('citas', $citas);
    }

    /**
     * Show the form for editing the specified Citas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $citas = $this->citasRepository->find($id);

        if (empty($citas)) {
            Flash::error('Citas not found');

            return redirect(route('citas.index'));
        }

        return view('citas.edit')->with('citas', $citas);
    }

    /**
     * Update the specified Citas in storage.
     *
     * @param int $id
     * @param UpdateCitasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitasRequest $request)
    {
        $citas = $this->citasRepository->find($id);

        if (empty($citas)) {
            Flash::error('Citas not found');

            return redirect(route('citas.index'));
        }

        $citas = $this->citasRepository->update($request->all(), $id);

        Flash::success('Citas updated successfully.');

        return redirect(route('citas.index'));
    }

    /**
     * Remove the specified Citas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $citas = $this->citasRepository->find($id);

        if (empty($citas)) {
            Flash::error('Citas not found');

            return redirect(route('citas.index'));
        }

        $this->citasRepository->delete($id);

        Flash::success('Citas deleted successfully.');

        return redirect(route('citas.index'));
    }
}
