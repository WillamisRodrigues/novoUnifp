<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFornecedorRequest;
use App\Http\Requests\UpdateFornecedorRequest;
use App\Repositories\FornecedorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FornecedorController extends AppBaseController
{
    /** @var  FornecedorRepository */
    private $fornecedorRepository;

    public function __construct(FornecedorRepository $fornecedorRepo)
    {
        $this->fornecedorRepository = $fornecedorRepo;
    }

    /**
     * Display a listing of the Fornecedor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fornecedors = $this->fornecedorRepository->all();

        return view('fornecedors.index')
            ->with('fornecedors', $fornecedors);
    }

    /**
     * Show the form for creating a new Fornecedor.
     *
     * @return Response
     */
    public function create()
    {
        return view('fornecedors.create');
    }

    /**
     * Store a newly created Fornecedor in storage.
     *
     * @param CreateFornecedorRequest $request
     *
     * @return Response
     */
    public function store(CreateFornecedorRequest $request)
    {
        $input = $request->all();

        $fornecedor = $this->fornecedorRepository->create($input);

        Flash::success('Fornecedor salvo com sucesso.');

        return redirect(route('fornecedors.index'));
    }

    /**
     * Display the specified Fornecedor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedors.index'));
        }

        return view('fornecedors.show')->with('fornecedor', $fornecedor);
    }

    /**
     * Show the form for editing the specified Fornecedor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedors.index'));
        }

        return view('fornecedors.edit')->with('fornecedor', $fornecedor);
    }

    /**
     * Update the specified Fornecedor in storage.
     *
     * @param int $id
     * @param UpdateFornecedorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFornecedorRequest $request)
    {
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedors.index'));
        }

        $fornecedor = $this->fornecedorRepository->update($request->all(), $id);

        Flash::success('Fornecedor atualizado com sucesso.');

        return redirect(route('fornecedors.index'));
    }

    /**
     * Remove the specified Fornecedor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedors.index'));
        }

        $this->fornecedorRepository->delete($id);

        Flash::success('Fornecedor deletado com sucesso.');

        return redirect(route('fornecedors.index'));
    }
}
