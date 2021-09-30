<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCitas_detalleRequest;
use App\Http\Requests\UpdateCitas_detalleRequest;
use App\Repositories\Citas_detalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Citas_detalleController extends AppBaseController
{
    /** @var  Citas_detalleRepository */
    private $citasDetalleRepository;

    public function __construct(Citas_detalleRepository $citasDetalleRepo)
    {
        $this->citasDetalleRepository = $citasDetalleRepo;
    }

    /**
     * Display a listing of the Citas_detalle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $citasDetalles = $this->citasDetalleRepository->all();

        return view('citas_detalles.index')
            ->with('citasDetalles', $citasDetalles);
    }

    /**
     * Show the form for creating a new Citas_detalle.
     *
     * @return Response
     */
    public function create()
    {
        return view('citas_detalles.create');
    }

    /**
     * Store a newly created Citas_detalle in storage.
     *
     * @param CreateCitas_detalleRequest $request
     *
     * @return Response
     */
    public function store(CreateCitas_detalleRequest $request)
    {
        $input = $request->all();

        $citasDetalle = $this->citasDetalleRepository->create($input);

        Flash::success('Citas Detalle saved successfully.');

        return redirect(route('citasDetalles.index'));
    }

    /**
     * Display the specified Citas_detalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $citasDetalle = $this->citasDetalleRepository->find($id);

        if (empty($citasDetalle)) {
            Flash::error('Citas Detalle not found');

            return redirect(route('citasDetalles.index'));
        }

        return view('citas_detalles.show')->with('citasDetalle', $citasDetalle);
    }

    /**
     * Show the form for editing the specified Citas_detalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $citasDetalle = $this->citasDetalleRepository->find($id);

        if (empty($citasDetalle)) {
            Flash::error('Citas Detalle not found');

            return redirect(route('citasDetalles.index'));
        }

        return view('citas_detalles.edit')->with('citasDetalle', $citasDetalle);
    }

    /**
     * Update the specified Citas_detalle in storage.
     *
     * @param int $id
     * @param UpdateCitas_detalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitas_detalleRequest $request)
    {
        $citasDetalle = $this->citasDetalleRepository->find($id);

        if (empty($citasDetalle)) {
            Flash::error('Citas Detalle not found');

            return redirect(route('citasDetalles.index'));
        }

        $citasDetalle = $this->citasDetalleRepository->update($request->all(), $id);

        Flash::success('Citas Detalle updated successfully.');

        return redirect(route('citasDetalles.index'));
    }

    /**
     * Remove the specified Citas_detalle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $citasDetalle = $this->citasDetalleRepository->find($id);

        if (empty($citasDetalle)) {
            Flash::error('Citas Detalle not found');

            return redirect(route('citasDetalles.index'));
        }

        $this->citasDetalleRepository->delete($id);

        Flash::success('Citas Detalle deleted successfully.');

        return redirect(route('citasDetalles.index'));
    }
}
