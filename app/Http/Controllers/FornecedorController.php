<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFornecedorRequest;
use App\Http\Requests\UpdateFornecedorRequest;
use App\Repositories\FornecedorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class FornecedorController extends AppBaseController
{
    /** @var  FornecedorRepository */
    private $fornecedorRepository;

    public function __construct(FornecedorRepository $fornecedorRepo)
    {
        $this->fornecedorRepository = $fornecedorRepo;
        $unidade = UnidadeController::getUnidade();
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
        PermissionController::temPermissao('fornecedores.index');
        $fornecedores = $this->fornecedorRepository->all()->where('idUnidade', $this->unidade);

        return view('fornecedores.index')
            ->with('fornecedores', $fornecedores);
    }

    /**
     * Show the form for creating a new Fornecedor.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('fornecedores.update');
        return view('fornecedores.create');
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
        PermissionController::temPermissao('fornecedores.update');
        $input = $request->all();

        $fornecedor = $this->fornecedorRepository->create($input);

        DB::table('fornecedor')->where('id', $fornecedor->id)->update(['idUnidade' => $this->unidade]);

        Flash::success('Fornecedor salvo com sucesso.');

        return redirect(route('fornecedores.index'));
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
        PermissionController::temPermissao('fornecedores.index');
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedores.index'));
        }

        return view('fornecedores.show')->with('fornecedor', $fornecedor);
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
        PermissionController::temPermissao('fornecedores.edit');
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedores.index'));
        }

        return view('fornecedores.edit')->with('fornecedor', $fornecedor);
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
        PermissionController::temPermissao('fornecedores.edit');
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedores.index'));
        }

        $fornecedor = $this->fornecedorRepository->update($request->all(), $id);

        Flash::success('Fornecedor atualizado com sucesso.');

        return redirect(route('fornecedores.index'));
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
        PermissionController::temPermissao('fornecedores.delete');
        $fornecedor = $this->fornecedorRepository->find($id);

        if (empty($fornecedor)) {
            Flash::error('Fornecedor não encontrado.');

            return redirect(route('fornecedores.index'));
        }

        $this->fornecedorRepository->delete($id);

        Flash::success('Fornecedor deletado com sucesso.');

        return redirect(route('fornecedores.index'));
    }
}
