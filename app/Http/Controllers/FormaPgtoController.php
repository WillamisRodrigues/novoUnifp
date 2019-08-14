<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormaPgtoRequest;
use App\Http\Requests\UpdateFormaPgtoRequest;
use App\Repositories\FormaPgtoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FormaPgtoController extends AppBaseController
{
    /** @var  FormaPgtoRepository */
    private $formaPgtoRepository;

    public function __construct(FormaPgtoRepository $formaPgtoRepo)
    {
        $this->formaPgtoRepository = $formaPgtoRepo;
    }

    /**
     * Display a listing of the FormaPgto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $formaPgtos = $this->formaPgtoRepository->all();

        return view('forma_pgtos.index')
            ->with('formaPgtos', $formaPgtos);
    }

    /**
     * Show the form for creating a new FormaPgto.
     *
     * @return Response
     */
    public function create()
    {
        return view('forma_pgtos.create');
    }

    /**
     * Store a newly created FormaPgto in storage.
     *
     * @param CreateFormaPgtoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPgtoRequest $request)
    {
        $input = $request->all();

        $formaPgto = $this->formaPgtoRepository->create($input);

        Flash::success('Forma Pgto saved successfully.');

        return redirect(route('formaPgtos.index'));
    }

    /**
     * Display the specified FormaPgto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formaPgto = $this->formaPgtoRepository->find($id);

        if (empty($formaPgto)) {
            Flash::error('Forma Pgto not found');

            return redirect(route('formaPgtos.index'));
        }

        return view('forma_pgtos.show')->with('formaPgto', $formaPgto);
    }

    /**
     * Show the form for editing the specified FormaPgto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formaPgto = $this->formaPgtoRepository->find($id);

        if (empty($formaPgto)) {
            Flash::error('Forma Pgto not found');

            return redirect(route('formaPgtos.index'));
        }

        return view('forma_pgtos.edit')->with('formaPgto', $formaPgto);
    }

    /**
     * Update the specified FormaPgto in storage.
     *
     * @param int $id
     * @param UpdateFormaPgtoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPgtoRequest $request)
    {
        $formaPgto = $this->formaPgtoRepository->find($id);

        if (empty($formaPgto)) {
            Flash::error('Forma Pgto not found');

            return redirect(route('formaPgtos.index'));
        }

        $formaPgto = $this->formaPgtoRepository->update($request->all(), $id);

        Flash::success('Forma Pgto updated successfully.');

        return redirect(route('formaPgtos.index'));
    }

    /**
     * Remove the specified FormaPgto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formaPgto = $this->formaPgtoRepository->find($id);

        if (empty($formaPgto)) {
            Flash::error('Forma Pgto not found');

            return redirect(route('formaPgtos.index'));
        }

        $this->formaPgtoRepository->delete($id);

        Flash::success('Forma Pgto deleted successfully.');

        return redirect(route('formaPgtos.index'));
    }
}
